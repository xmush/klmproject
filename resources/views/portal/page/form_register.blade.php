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

    <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
@endsection

@section('logo')
    <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h2 class="text-light"><a href="{{route('/')}}#intro" class="scrollto"><span>KLM PROJECT</span></a></h2>
        {{-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> --}}
    </div>
@endsection

@section('navigation')
    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
        <li class=""><a href="{{route('/')}}#intro">Home</a></li>
        <li><a href="{{route('/')}}#information">Information</a></li>
        <li><a href="{{route('summary')}}">Summary</a></li>
        {{-- <li><a href="#varietas">Variety</a></li>
        <li><a href="#awards">Awards</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#footer">Contact Us</a></li> --}}
        <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav><!-- .main-nav -->
@endsection

@section('s_faq')
    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq" class="pb-2">
        <div class="container">
          <header class="section-header mt-3">
            <h3>Form Pendaftaran Peserta</h3>
            <p class="pb-1">Isi form dibawah ini untuk mendapatkan akun dan ikut berpartisipasi</p>
          </header>
  
        </div>
    </section><!-- #faq -->
@endsection

@section('footer')
    <!--==========================
    Footer
    ============================-->
    <footer id="footer" class="section-bg">
        <div class="footer-top pt-5">
            <div class="container">

                <div class="row justify-content-md-center">

                    <div class="col-lg-6">
                        <form action="{{route('user_register')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control nama_lengkap" id="nama_lengkap" name="nama_lengkap" value="" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">No. Telpon</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control no_hp" name="no_hp" id="no_hp" value="" placeholder="No. Telpon / WA" pattern=".[0-9]{9,14}" required title=" angka panjang 10 -14 karakter">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Alamat Email</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="email" class="form-control email" name="email" id="email" value="" placeholder="Email" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Alamat</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control alamat" name="alamat" id="alamat" value="" placeholder="Asal Daerah Pemilik" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Provinsi</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="provinsi" id="propinsi" required>
                                        <option selected value=""> Pilih Provinsi </option>
                                    </select>
                                    <input type="hidden" name="prov" id="prov" value="">
                                    {{-- <input type="text" class="form-control" id="owner_name" value="" placeholder="Nama Handling"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Asal Kota</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="kabupaten" id="kabupaten" required>
                                        <option selected value=""> Pilih Kabupaten </option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Username</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" required minlength="6" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Password</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required minlength="6" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Ulangi Password</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password2" id="password2" value="" placeholder="Ulangi Password" required minlength="6" autocomplete="off">
                                </div>
                            </div>                                                            
                            <div class="form-group row">
                                <div class="col-sm-4 col-xs-12 text-right">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    {{-- <button type="submit" class="btn btn-primary" id="btn_submit">Daftar</button> --}}
                                    <button type="button" class="btn btn-primary" id="btn_alert">Daftar</button>
                                </div>
                            </div>                                                                                                                                                                                                                        
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Edited By <a href="https://www.instagram.com/mush_60/">Mush60</a>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        <!-- Template Main Javascript File -->
    <script src="{{asset('/dist/js/main.js')}}"></script>
    <script>
        var return_first = function() {
        var tmp = null;
        $.ajax({
                'async': false,
                'type': "get",
                'global': false,
                'dataType': 'json',
                'url': 'https://x.rajaapi.com/poe',
                'success': function(data) {
                    tmp = data.token;
                }
            });
            return tmp;
        }();
        $(document).ready(function(){
            if($('#flash_data').length) {
                    let type = $('#flash_data').data('type');
                    let msg = $('#flash_data').data('msg');
                
                    Swal.fire({
                        icon: type,
                        text: msg,
                        showConfirmButton: true
                    }).then((result) => {
                        var url = "{{route('login')}}";
                        $(location).attr('href', url);
                    });
            };
            $.ajax({
                cache : false
            });
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
                type: 'GET',
                dataType: 'json',
                success: function(json) {
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            if(json.data[i].name == 'SULAWESI SELATAN') {
                                $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id).attr('data-prov', json.data[i].name).attr('selected', true));
                                var propinsi = $("#propinsi").val();
                                $.ajax({
                                    url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                                    data: "idpropinsi=" + propinsi,
                                    type: 'GET',
                                    cache: false,
                                    dataType: 'json',
                                    success: function(json) {
                                        $("#kabupaten").html('');
                                        if (json.code == 200) {
                                            for (i = 0; i < Object.keys(json.data).length; i++) {
                                                $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                                            }
                                        } else {
                                            $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                                        }
                                        $('#prov').val($('#propinsi').children('option:selected').data('prov'));
                                    }
                                });
                            } else {
                                $('#propinsi').append($('<option>').text(json.data[i].name).attr('data-prov', json.data[i].name).attr('value', json.data[i].id));
                            }
                        }
                    } else {
                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
            $("#propinsi").change(function() {
                var propinsi = $("#propinsi").val();
                $("#prov_name").val($("#propinsi").text());
                $.ajax({
                    url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                    data: "idpropinsi=" + propinsi,
                    type: 'GET',
                    cache: false,
                    dataType: 'json',
                    success: function(json) {
                        $("#kabupaten").html('');
                        if (json.code == 200) {
                            for (i = 0; i < Object.keys(json.data).length; i++) {
                                $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                            }
                        } else {
                            $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                        }
                        $('#prov').val($('#propinsi').children('option:selected').data('prov'));
                    }
                });
            });
            $("#nama_lengkap").keyup(function(){
                var v = this.value.toUpperCase();
                $("#nama_lengkap").val(v);
            });
            $("#alamat").keyup(function(){
                var v = this.value.toUpperCase();
                $("#alamat").val(v);
            });
            $("#username").keypress(function(e){
                var v = String.fromCharCode(e.which);
                if(!v.match(/[a-zA-Z0-9]/)) {
                    return false;
                }
            });
            $("#no_hp").keypress(function(e){
                var v = String.fromCharCode(e.which);
                if(!v.match(/[0-9]/)) {
                    return false;
                }
            }); 
            $("#password2").keyup(function(){
                var v1 = $(this).val()
                var v2 = $('#password').val()
                if(v1!=v2) {
                    $('#password').addClass('is-invalid');
                    $('#password2').addClass('is-invalid');
                } else {
                    $('#password').removeClass('is-invalid');
                    $('#password2').removeClass('is-invalid');
                }
            }); 
            $('#btn_alert').click(function(){
                Swal.fire({
                    icon: 'warning',
                    title: 'Maaf...',
                    text: 'Pendaftaran ditutup!!'
                })
            });           
        });
    </script>
@endsection