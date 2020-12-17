<?php
namespace App\json;
use Illuminate\Http\Request;

class Konten {
    public static function config() {
        return [
            "basepath"   => "storage/konten.json",
        ];
    }

    public static function read() {
          $config = Konten::config();
          if( !file_exists($config['basepath']) ) {
            $array = Array ();
            $json = json_encode($array);
            $fileStream = fopen($config['basepath'], 'w');
            fwrite( $fileStream , $json);
            fclose($fileStream);
            $bytes = file_put_contents($config['basepath'], $json);
          }
          $konten = file_get_contents(base_path($config['basepath']));
          $array  = json_decode($konten, true);
        return $array;
    }

    public static function find($slug) {
        $config = Konten::config();
        $json = Konten::read();
        foreach ($json as $key => $value) {
            if( $value['slug'] == $slug ) {
                return $value;
            }
        }
        return null;
    }

    public static function category($cat) {
        $config = Konten::config();
        $json   = Konten::read();
        $array  = [];
        foreach ($json as $key => $value) {
            if( $value['kategori'] == $cat ) {
                array_push($array, $value);
            }
        }
        return $array;
    }

    public static function store(Request $request) {
        $config = Konten::config();
        $json = Konten::read();
        $images = 'main/img/portfolio/portfolio_0'.rand(1,9).'.jpg';
        $destinationPath = 'uploads/tumbnail/';
        if ($request->file('tumbnail')) {
            $fileName = date('YmdHis'). '-' . md5($request->judul) . ".".$request->file('tumbnail')->getClientOriginalExtension();
            $request->file('tumbnail')->move($destinationPath, $fileName);
            $images = $destinationPath.$fileName;
        }
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
       $json = json_encode($json, JSON_PRETTY_PRINT);
       // array_push($json, $konten);
       if( file_put_contents(base_path($config['basepath']), $json) ) {
           return true;
       }
       return false;
    }

    public static function update(Request $request, $slug) {
          $config = Konten::config();
          $json   = Konten::read();
          $updateImg = false;
          if(isset($request['tumbnail'])) {
              if ($request->file('tumbnail')) {
                  $fileName = date('YmdHis'). '-' . md5($request->judul) . ".".$request->file('tumbnail')->getClientOriginalExtension();
                  $request->file('tumbnail')->move($destinationPath, $fileName);
                  $images = $destinationPath.$fileName;
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
          $json = json_encode($json, JSON_PRETTY_PRINT);
          if( file_put_contents(base_path($config['basepath']), $json) ) {
              return true;
          }
          return false;
      }

      public static function delete(Request $request, $slug) {
            $config = Konten::config();
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
            $json = json_encode($json, JSON_PRETTY_PRINT);
            if( file_put_contents(base_path($config['basepath']), $json) ) {
                return true;
            }
            return false;
        }


}
