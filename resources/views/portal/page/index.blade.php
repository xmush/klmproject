@extends('portal.layout.main')

@section('page_title')
    Koi Lover Makassar Project
@endsection

@section('meta_link_css_etc')
    <!-- Favicons -->
    {{-- <link href="{{asset('/dist/img/favicon.png')}}" rel="icon">
    <link href="{{asset('/dist/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('/dist/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('/dist/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset('/dist/css/style.css')}}" rel="stylesheet">

    <style>
    .mimg {
        width: 100%;
    }
    </style>

    <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
@endsection

@section('topbar_header')
    <div id="topbar">
        <div class="container">
        <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
        </div>
    </div>
@endsection

@section('logo')
    <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h2 class="text-light"><a href="#intro" class="scrollto"><span>KLM PROJECT</span></a></h2>
        {{-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> --}}
    </div>
@endsection

@section('navigation')
    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#information">Information</a></li>
        <li><a href="{{route('summary')}}">Summary</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav><!-- .main-nav -->
@endsection

@section('s_intro')
    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
            <h2>Makassar<br>Junior Koi Contest<br><span>2020</span></h2>
            <div>
                <a href="{{route('register')}}" class="btn-get-started scrollto">Daftar disini</a>
            </div>
            </div>
    
            <div class="col-md-6 intro-img order-md-last order-first">
            <img src="{{asset('/dist/img/intro-kl.svg')}}" alt="" class="img-fluid">
            </div>
        </div>

        </div>
    </section><!-- #intro -->    
@endsection

@section('s_info')
    <!--==========================
      Information Section
    ============================-->
    <section id="information">

        <div class="container">
          <div class="row">
  
            <div class="col-lg-5 col-md-6">
              <div class="about-img">
                <img src="{{asset('/dist/img/banner_contest.jpg')}}" alt="">
              </div>
            </div>
  
            <div class="col-lg-7 col-md-6">
                <div class="about-content">
                    <h2>Information</h2>
                    <h3>Informasi dan Tata Cara Pendaftaran Event Makassar Junior Koi Kontest yang diselenggarakan oleh Koi Lovers Makassar Project</h3>
                
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Isi data diri secara lengkap yang tersedia pada menu form register atau klik Daftar disini </li>
                        <li><i class="ion-android-checkmark-circle"></i> Login dengan menggunakan username dan password yang telah diisi sebelumnya pada menu register</li>
                        <li><i class="ion-android-checkmark-circle"></i> Input jenis atau kategori yang diikuti pada sub menu fish entry</li>
                        <li><i class="ion-android-checkmark-circle"></i> Lakukan pembayaran dengan cara transfer ke rekening panitia dan lakukan konfirmasi pembayaran melalui WA ke nomor panitia</li>
                        <li><i class="ion-android-checkmark-circle"></i> Untuk informasi selengkapnya silahkan hubungi kami di +62-852-9722-2999.</li>
                    </ul>
                </div>
            </div>
          </div>
        </div>
  
    </section><!-- #about -->    
    <div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img src="{{'/dist/img/lg_klm.jpg'}}" class="rounded mimg" alt="KLM PROJECT 2020">
                </div>
            </div>
            <div class="modal-footer my-0 py-1 d-flex justify-content-center">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
              <a href="{{route('register')}}" class="btn btn-sm btn-primary">Daftar</a>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('s_varietas')
@endsection

@section('footer')
    <!--==========================
    Footer
    ============================-->
    <footer id="footer" class="section-bg">
        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- #footer -->
@endsection

@section('src_js')
    <script src="{{asset('/dist/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/dist/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('/dist/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/dist/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/dist/lib/mobile-nav/mobile-nav.js')}}"></script>
    <script src="{{asset('/dist/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('/dist/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/dist/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('/dist/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/dist/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/dist/lib/lightbox/js/lightbox.min.js')}}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{asset('/dist/contactform/contactform.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset('/dist/js/main.js')}}"></script>
    <script>
    $(document).ready(function(){
        $('#welcome').modal('show');
        console.log('run')
    })
    </script>
@endsection