<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\json\Konten;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $edit = '';
        if( isset($request->artikel) && !is_null($request->artikel) ){
            $edit = $request->artikel;
            $edit = Konten::find($edit);
            if(is_null($edit)){
              Session::flash('error', 'Konten tidak ditemukan');
              return redirect()->route('home');
            }
            // Cari artikel yg dituju
        }
        $visual = Konten::category('karya-visual');
        $sastra = Konten::category('karya-sastra');
        return view('welcome', compact('edit', 'visual', 'sastra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Konten::find($request->slug) != null){
            $request['slug'] .="-".dechex ( rand(1,18) * rand(1,24) );
        }
        if($request->kategori == "karya-sastra" || $request->kategori == "karya-visual"){
        }else{
          return redirect()->back()->with('error', 'Opsi konten kategori tidak valid!');
        }
        $validation = $this->validasi($request);
        if($validation->fails()){
            return redirect()->back()->with('error', 'Kesalahan saat menambahkan artikel! <br>'.$validation->errors()->first());
        }

        if( Konten::store($request) ) {
            Session::flash('success', 'Konten sudah ditambah');
        }else{
            Session::flash('error', 'Gagal menambah konten');
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $konten = Konten::find($slug);
        if(is_null($konten)){
          Session::flash('error', 'Konten tidak ditemukan');
          return redirect()->route('home');
        }
        return view('show', compact('konten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validation = $this->validasi($request);
        if($validation->fails()){
            return redirect()->back()->with('error', 'Kesalahan saat memperbarui artikel! <br>'.$validation->errors()->first());
        }
        if( Konten::update($request, $slug) ) {
            Session::flash('success', 'Konten sudah diperbarui');
        }else{
            Session::flash('error', 'Gagal memperbarui konten');
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        if( Konten::delete($request, $slug) ) {
            Session::flash('success', 'Konten sudah dihapus');
        }else{
            Session::flash('error', 'Gagal menghapus konten');
        }
        return redirect()->route('home');
    }

    public function validasi(Request $request)
    {
      if(isset($request['slug'])){
          $dataValidator = [
            'judul' => 'required|string|min:5',
            'kontributor' => 'required|string',
            'konten' => 'required|string',
            'kategori' => 'required|string',
            'slug' => 'required|string|alpha_dash|max:64|',
          ];
      }else{
          $dataValidator = [
            'judul' => 'required|string|min:5|max:16',
            'konten' => 'required|string',
            'kategori' => 'required|string',
          ];
      }
      return \Validator::make($request->all(), $dataValidator);
    }
}
