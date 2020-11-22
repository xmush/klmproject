<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>

      @yield('page_title')

  </title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  @yield('meta_link_css_etc')

</head>

<body>
  @if (Session::has('notif.type') && Session::has('notif.msg'))
      <div id="flash_data" data-type="{{Session::get('notif.type')}}" data-msg="{{Session::get('notif.msg')}}"></div>
  @endif
  <!--==========================
  Header
  ============================-->
  <header id="header">

    @yield('topbar_header')
    

    <div class="container">

        @yield('logo')

        @yield('navigation')
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  @yield('s_intro')


  <main id="main">

    @yield('s_info')


    @yield('s_varietas')

    @yield('s_awards')

    @yield('s_faq')

  </main>

    @yield('footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  @yield('src_js')

</body>
</html>
