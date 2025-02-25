<?php
namespace App\json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

define("KONTEN_PATH", "public/konten.json");

class Konten {

    public static function read() {
        if (Storage::disk('local')->has(KONTEN_PATH)) {
             $konten = Storage::get(KONTEN_PATH);
         }else{
             $konten = Storage::disk('local')->put(KONTEN_PATH, json_encode([]));
         }
        $array  = json_decode($konten, true);
        return $array;
    }

    public static function find($slug) {
        $json = Konten::read();
        foreach ($json as $key => $value) {
            if( $value['slug'] == $slug ) {
                return $value;
            }
        }
        return null;
    }

    public static function category($cat) {
        $json   = Konten::read();
        $array  = [];
        foreach ($json as $key => $value) {
            if( $value['kategori'] == $cat ) {
                array_push($array, $value);
            }
        }
        return $array;
    }

    public static function upload_tumbnail(Request $request){
      $fileName = date('YmdHis'). '-' . $request->judul . ".".$request->file('tumbnail')->getClientOriginalExtension();
      $request->file('tumbnail')->storeAs('public/tumbnail', $fileName);
      $path = 'storage/tumbnail/'.$fileName;
      return $path;
    }

    public static function store(Request $request) {
        $json = Konten::read();
        $images = 'main/img/portfolio/portfolio_0'.rand(1,9).'.jpg';
        if ($request->file('tumbnail')) {
            $images = Konten::upload_tumbnail($request);
        }
        // $destinationPath = 'uploads/tumbnail/';
        // if ($request->file('tumbnail')) {
        //     $fileName = date('YmdHis'). '-' . md5($request->judul) . ".".$request->file('tumbnail')->getClientOriginalExtension();
        //     $request->file('tumbnail')->move($destinationPath, $fileName);
        //     $images = $destinationPath.$fileName;
        // }
        $konten = array (
           'id'           => count($json)+1,
           'judul'        =>  $request->judul,
           'kontributor'  => $request->kontributor,
           'konten'       => $request->konten,
           'kategori'     => $request->kategori,
           'slug'         => $request->slug,
           'tag'          => $request->tag,
           'created'      => date('d-m-Y'),
           'tumbnail'     => $images,
           'updated'      => null
       );
       // $konten = json_encode($konten, JSON_PRETTY_PRINT);
       $json[] = $konten;
       if( Storage::disk('local')->put(KONTEN_PATH,
           json_encode($json, JSON_PRETTY_PRINT)) ) {
           return true;
       }
       return false;
    }

    public static function update(Request $request, $slug) {
          $json   = Konten::read();
          $updateImg = false;
          if(isset($request['tumbnail'])) {
              if ($request->file('tumbnail')) {
                  $images = Konten::upload_tumbnail($request);
              }
              $updateImg = true;
          }
          $target = -1;
          foreach ($json as $key => $value) {
              if( $value['slug'] == $slug ) {
                $target = $key;
              }
          }
          $old_data = Konten::find($slug);
          if($old_data == null || $target < 0){
            return false;
          }
          $json[$target]['judul']        = $request->judul;
          if(isset($request['konstributor'])) {
            $json[$target]['kontributor'] .=", ".$request->kontributor;
          }
          $json[$target]['konten']       = $request->konten;
          $json[$target]['kategori']     = $request->kategori;
          $json[$target]['tag']          = $request->tag;
          $json[$target]['updated']      = date('d-m-Y');
          if($updateImg){
            $json[$target]['tumbnail']   = $images;
          }
          if( Storage::disk('local')->put(KONTEN_PATH,
              json_encode($json, JSON_PRETTY_PRINT)) ) {
              return true;
          }
          return false;
      }

      public static function delete(Request $request, $slug) {
          //$config = Konten::config();
            $json   = Konten::read();
            $target = -1;
            foreach ($json as $key => $value) {
                if( $value['slug'] == $slug ) {
                  $target = $key;
                }
            }
            $old_data = Konten::find($slug);
            if($old_data == null || $target < 0){
              return false;
            }
            unset($json[$target]);
            if( Storage::disk('local')->put(KONTEN_PATH,
                json_encode($json, JSON_PRETTY_PRINT)) ) {
                return true;
            }
            return false;
        }


}
