@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
  <!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
  <div id="headerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <h5>Berbagi kisah dan karya.</h5>
          <h1>HARTicle.</h1>
          <h3>Tunjukkan karya dengan bangga</h3>
          <h3>Tuliskan kisah dan ekspresikan kreasimu.</h3>
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /headerwrap -->

  <!-- *****************************************************************************************************************
	 PORTFOLIO SECTION
	 ***************************************************************************************************************** -->
  <div id="portfoliowrap">
    <h3>PAPAN KARYA</h3>

    <div class="portfolio-centered">
      @if( count($visual) <1 )
      <h4>Belum ada artikel dari kontributor, jadilah orang yang pertama dengan klik <a href="javascript:void(0)" data-toggle="modal" data-target="#mdcreate" > tulis konten</a></h4>
      @endif
      <div class="recentitems portfolio">
        @foreach ($visual as $value)
        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
            <img src="{{ asset($value['tumbnail']) }}" alt="" style="max-height: 215px;">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">{{$value['judul']}}</h3>
                <p>{!!substr($value['konten'],0,400)!!} @if(strlen($value['konten'])>400)...@endif</p>
                <!-- <a data-rel="prettyPhoto" href="{{ asset('main/img/portfolio/portfolio_09.jpg') }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-camera"></i></a> -->
                <a href="{{ route('article.show', $value['slug']) }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                <a href="{{ route('home') }}?artikel={{ $value['slug'] }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-pencil"></i></a>
                <form style="display:inline-block" action="{{route('article.destroy', $value['slug'])}}" method="POST"><input type="hidden" name="_method" value="delete">{{csrf_field()}}
                  <button type="submit" href="#" class="dmbutton a2" data-animate="fadeInUp" onclick="return confirm('Apakah yakin untuk menghapus konten {{$value['judul']}}?')"><i class="fa fa-trash"></i></button>
                </form>
              </div>
              <!-- he bg -->
            </div>
            <!-- he view -->
          </div>
          <!-- he wrap -->
        </div>
        <!-- end col-12 -->

        @endforeach

      </div>
      <!-- portfolio -->
    </div>
    <!-- portfolio container -->
  </div>
  <!--/Portfoliowrap -->

  <div id="cwrap">
    <div class="container">
      <div class="row">
        <h3>ARTIKEL KONTRIBUTOR</h3>
        <ul class="popular-posts">
            @if( count($sastra) <1 )
              <h4>Belum ada artikel dari kontributor, jadilah orang yang pertama dengan klik <a href="javascript:void(0)" data-toggle="modal" data-target="#mdcreate" > tulis konten</a></h4>
            @endif
            @foreach($sastra as $value)
            <li class="post-box">
              <a href="{{ route('article.show', $value['slug']) }}"><img src="{{ asset($value['tumbnail']) }}" alt="Popular Post" class="tumbnail" style="max-height:50px"></a>
              <h4><a href="{{ route('article.show', $value['slug']) }}">{{$value['judul']}}</a></h4>
              <p>{!!substr($value['konten'],0,800)!!} @if(strlen($value['konten'])>800)...@endif</p>
              <em>Diunggah pada {{ $value['created'] }}</em>
                <br>
              <a href="{{ route('home') }}?artikel={{$value['slug']}}" class="action">ajukan penyuntingan</a>
            </li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>



    <!-- *****************************************************************************************************************
  	 TESTIMONIALS
  	 ***************************************************************************************************************** -->
    <div id="twrap">
      <div class="container centered">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <i class="fa fa-comment-o"></i>
            <p>Teman-teman boleh menambahkan konten pada laman website ini, namun dengan catatan untuk tetap sopan.
            Adapun tujuan dari laman ini sebagai nilai pelengkap pada UTS dari Matakuliah Pemrograman Berbasis Framework. Teman-teman juga dapat turut serta menambahkan konten untuk website ini dengan menekan tombol berikut.</p>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#mdcreate" class="btn btn-sm btn-info">Tambah Konten</a>
            <h4><br/>Hartawan Bahari M</h4>
            <p>Content Manager</p>
          </div>
        </div>
      </div>
    </div>

  <!-- *****************************************************************************************************************
	 OUR CLIENTS
	 ***************************************************************************************************************** -->
  <!-- <div id="cwrap">
    <div class="container">
      <div class="row centered">
        <h3>OUR CLIENTS</h3>
        <a href="#">
        <div class="col-lg-3 col-md-3 col-sm-3 post-box">
          <img src="{{ asset('main/img/clients/client01.png') }}" class="img-responsive">
          <h3 id="post-title">Judul</h3>
          <p>Aenean sit amet convallis sem, in porttitor enim. Suspendisse potenti.
            Ut ullamcorper odio in luctus dictum. Vestibulum pulvinar massa nec magna cursus, et lacinia ante ultricies.</p>
        </div></a>
        <a href="#">
        <div class="col-lg-3 col-md-3 col-sm-3 post-box">
          <img src="{{ asset('main/img/portfolio/portfolio_02.jpg') }}" class="img-responsive">
          <h3 id="post-title">Judul</h3>
          <p>Aenean sit amet convallis sem, in porttitor enim. Suspendisse potenti.
            Ut ullamcorper odio in luctus dictum. Vestibulum pulvinar massa nec magna cursus, et lacinia ante ultricies.</p>
        </div></a>
        <a href="#">
        <div class="col-lg-3 col-md-3 col-sm-3 post-box">
          <img src="{{ asset('main/img/clients/client03.png') }}" class="img-responsive">
          <h3 id="post-title">Judul</h3>
          <p>Aenean sit amet convallis sem, in porttitor enim. Suspendisse potenti.
            Ut ullamcorper odio in luctus dictum. Vestibulum pulvinar massa nec magna cursus, eqweqwe qweqweq qweqwe qweqe3 t5et t lacinia ante ultricies.</p>
        </div></a>
      </div>
    </div>
  </div> -->

@endsection
@section('js')

@endsection('js')
