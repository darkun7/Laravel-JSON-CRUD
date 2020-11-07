<?php
namespace App\json;
use Illuminate\Http\Request;

class Konten {
    public static function config() {
        return [
            "basepath"   => "public/json/posts.json",
        ];
    }

    public static function read() {
          $config = Konten::config();
          if( !file_exists($config['basepath']) ) {
            $array = Array ();
            $json = json_encode($array);
            $bytes = file_put_contents($config['basepath'], $json);
          }
          $konten = file_get_contents(base_path($config['basepath']));
          $array  = json_decode($konten, true);
        return $array;
    }

    public static function store(Request $request) {
        $json = Konten::read();
        $images = '';
        $destinationPath = 'uploads/tumbnail/';
        if ($request->file('tumbnail')) {
            $fileName = date('YmdHis'). '-' . Str::random(25) . ".".$uploadFile->getClientOriginalExtension();
            $request->file('tumbnail')->move($destinationPath, $fileName);
            $images = $destinationPath.$fileName;
        }
        $konten = (object) [
           'id' => count($posts)+1,
           'judul' =>  $request->judul,
           'kontributor' => $request->kontributor,
           'konten' => $request->konten,
           'kategori' => $request->kategori,
           'tag' => $request->tag,
           'created' => now(),
           'tumbnail' => $images,
           'updated' => null
       ];
       array_push($json, $konten);
       $konten = json_encode($konten, JSON_PRETTY_PRINT);
       if( file_put_contents(base_path($config['basepath']), $konten) ) {
           return true;
       }
       return false;
    }


}
