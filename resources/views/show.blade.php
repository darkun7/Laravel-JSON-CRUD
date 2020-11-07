@extends('layouts.main')

@section('title')
{{$konten['judul']}} | {{$konten['kategori']}}
@endsection

@section('content')
<div id="blue">
  <div class="container">
    <div class="row">
      <h3>{{$konten['judul']}}</h3>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>

<div class="container mt mb">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1 centered">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <img src="{{asset($konten['tumbnail'])}}" alt="" style="max-height: 200px">
        <!-- Wrapper for slides -->
      </div>
    </div>

    <div class="col-lg-5 col-lg-offset-1">
      <div class="spacing"></div>
      <h4>{{$konten['judul']}}</h4>
      {!!$konten['konten']!!}
    </div>

    <div class="col-lg-4 col-lg-offset-1">
      <div class="spacing"></div>
      <!-- <h4>Project Details</h4> -->
      <div class="hline"></div>
      <p><b>Tanggal diunggah:</b> {{$konten['created']}}</p>
      @if($konten != null)
      <p><b>Tanggal disunting:</b> {{$konten['updated']}}</p>
      @endif
      <p><b>Kontributor:</b> {{$konten['kontributor']}}</p>
      <p><b>Jenis:</b> {{$konten['kategori']}}</p>
      <?php
      $tags = $konten['tag'];
      $tags = explode(';', $tags);
       ?>
      <p><b>Tag:</b> @foreach($tags as $tag)<span class="badge badge-secondary">{{$tag}}</span>  @endforeach</p>
      <p>Konten tidak sesuai? <a href="{{ route('home') }}?artikel={{$konten['slug']}}"> buat penyuntingan</a></p>
      <form style="display:inline-block" action="{{route('article.destroy', $konten['slug'])}}" method="POST"><input type="hidden" name="_method" value="delete">{{csrf_field()}}
        <button type="submit" name="button" onclick="return confirm('Apakah yakin untuk menghapus konten {{$konten['judul']}}?')"><i class="fa fa-warning"></i> Laporkan!</button>
      </form>
    </div>

  </div>
</div>
@endsection
