<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>HARTicle - @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('main/img/favicon/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('main/img/favicon/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('main/img/favicon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('main/img/favicon/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('main/img/favicon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('main/img/favicon/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('main/img/favicon/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('main/img/favicon/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('main/img/favicon/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('main/img/favicon/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('main/img/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('main/img/favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('main/img/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('main/img/favicon/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('main/img/favicon/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900|Lato:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('main/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('main/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('main/lib/prettyphoto/css/prettyphoto.css') }}" rel="stylesheet">
  <link href="{{ asset('main/lib/hover/hoverex-all.css') }}" rel="stylesheet">
  <link href="{{ asset('main/lib/toastr/toastr.min.css') }}" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Template Name: Solid
    Template URL: https://templatemag.com/solid-bootstrap-business-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <link rel="stylesheet" href="{{ asset('main/css/custom.css') }}">
  @yield('css')
</head>

<body>
@include('modal.tentang')
@include('modal.create')
@if(isset($edit) && $edit != "")
    @include('modal.edit')
@endif
  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="{{ route('home') }}">HARTicle.</a>
      </div>
      <div class="navbar-collapse collapse navbar-right">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{ route('home') }}">BERANDA</a></li>
          <li><a href="" data-toggle="modal" data-target="#mdtentang">TENTANG</a></li>
          <li><a href="" data-toggle="modal" data-target="#mdcreate"><i class="fa fa-plus mr-5"></i>  TULIS KONTEN</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
  @yield('content')


  <!-- *****************************************************************************************************************
   FOOTER
   ***************************************************************************************************************** -->
  <div id="footerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>Tentang</h4>
          <div class="hline-w"></div>
          <p>Laman website portofolio desain yang dibuat guna memenuhi nilai tugas pemrograman berbasis framework.</p>
        </div>
        <div class="col-lg-4">
          <h4>Terhubung Denganku</h4>
          <div class="hline-w"></div>
          <p>
            <a href="https://www.facebook.com/hartawan.bahari.7"><i class="fa fa-facebook"></i></a>
            <a href="https://www.linkedin.com/in/hartawan-bahari-mulyadi-973a311b4/"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.instagram.com/htw.7/"><i class="fa fa-instagram"></i></a>
            <a href="https://www.github.com/darkun7/"><i class="fa fa-github"></i></a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>Darkun7</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/solid-bootstrap-business-template/
          Licensing information: https://templatemag.com/license/
        -->
        Created with Solid template by <a href="https://templatemag.com/">TemplateMag</a>
      </div>
    </div>
  </div>
  <!-- / copyrights -->
  <!-- JavaScript Libraries -->
  <script src="{{ asset('main/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('main/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('main/lib/php-mail-form/validate.js') }}"></script>
  <script src="{{ asset('main/lib/prettyphoto/js/prettyphoto.js') }}"></script>
  <script src="{{ asset('main/lib/isotope/isotope.min.js') }}"></script>
  <script src="{{ asset('main/lib/hover/hoverdir.js') }}"></script>
  <script src="{{ asset('main/lib/hover/hoverex.min.js') }}"></script>
  <script src="{{ asset('main/lib/toastr/toastr.min.js') }}"></script>
  <!-- Template Main Javascript File -->
  <script src="{{ asset('main/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css"/>
  @if(isset($edit) && $edit != "")
      <script type="text/javascript">
          $(window).on('load',function(){
              $('#mdedit').modal('show');
              $('#summernote2').summernote({
              toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontname', ['fontname']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen']],
              ]
              });
          });
          $
      </script>
  @endif
  <script>
      $('#summernote').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['fontname', ['fontname']],
        ['table', ['table']],
        ['insert', ['link', 'picture']],
        ['view', ['fullscreen']],
      ]
      });

      @if($message = Session::get('success'))
      $(window).on("load",function(){
      	window.setTimeout(function(){
      		$.toast({
      			heading: 'Sukses',
      			text: '{{$message}}',
      			position: 'top-right',
            bgColor: '#18C967',
      			loaderBg:'#A4DE02',
      			icon: '',
      			hideAfter: 3500,
      			stack: 6
      		});
      	}, 1000);
      });
      @endif
      @if ($message = Session::get('error'))
      $(window).on("load",function(){
      	window.setTimeout(function(){
      		$.toast({
      			heading: 'Kesalahan',
      			text: '{{$message}}',
      			position: 'top-right',
            bgColor:'#E01A31',
      			loaderBg:'#B53737',
      			icon: '',
      			hideAfter: 3500,
      			stack: 6
      		});
      	}, 1000);
      });
      @endif

      $( ".judul" ).keyup(function(){
        var judul  = $('.judul').val()
        var slug  = $('.slug').val(judul.toString().toLowerCase().normalize('NFD').trim().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '').replace(/\-\-+/g, '-'));
        var slugP = $('.slug-prev').text($('.slug').val());
      });

  </script>
  @yield('js')
</body>
</html>
