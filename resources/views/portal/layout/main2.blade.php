
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
        
        @yield('page_title')

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{asset('/bwatch/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('/bwatch/css/custom.min.css')}}">
    @yield('pagecss')
  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a href="{{route('/')}}" class="navbar-brand">KLM PROJECT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Home <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="../default/">Default</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../cerulean/">Cerulean</a>
                <a class="dropdown-item" href="../cosmo/">Cosmo</a>
                <a class="dropdown-item" href="../cyborg/">Cyborg</a>
                <a class="dropdown-item" href="../darkly/">Darkly</a>
                <a class="dropdown-item" href="../flatly/">Flatly</a>
                <a class="dropdown-item" href="../journal/">Journal</a>
                <a class="dropdown-item" href="../litera/">Litera</a>
                <a class="dropdown-item" href="../lumen/">Lumen</a>
                <a class="dropdown-item" href="../lux/">Lux</a>
                <a class="dropdown-item" href="../materia/">Materia</a>
                <a class="dropdown-item" href="../minty/">Minty</a>
                <a class="dropdown-item" href="../pulse/">Pulse</a>
                <a class="dropdown-item" href="../sandstone/">Sandstone</a>
                <a class="dropdown-item" href="../simplex/">Simplex</a>
                <a class="dropdown-item" href="../sketchy/">Sketchy</a>
                <a class="dropdown-item" href="../slate/">Slate</a>
                <a class="dropdown-item" href="../solar/">Solar</a>
                <a class="dropdown-item" href="../spacelab/">Spacelab</a>
                <a class="dropdown-item" href="../superhero/">Superhero</a>
                <a class="dropdown-item" href="../united/">United</a>
                <a class="dropdown-item" href="../yeti/">Yeti</a>
              </div>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{route('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('summary')}}">Summary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('point')}}">Point</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('bis')}}">Best In Size</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('champion')}}">Champion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('regular')}}">Reguler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="https://blog.bootswatch.com">Blog</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Litera <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" target="_blank" href="https://jsfiddle.net/bootswatch/rnjfzjjo/">Open in JSFiddle</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../4/litera/bootstrap.min.css" download>bootstrap.min.css</a>
                <a class="dropdown-item" href="../4/litera/bootstrap.css" download>bootstrap.css</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../4/litera/_variables.scss" download>_variables.scss</a>
                <a class="dropdown-item" href="../4/litera/_bootswatch.scss" download>_bootswatch.scss</a>
              </div>
            </li> --}}
          </ul>

        </div>
      </div>
    </div>


    <div class="container">
        
        @yield('content')

      <footer id="footer">
        <div class="row">
          <div class="col-lg-12">

            <ul class="list-unstyled">
              <li class="float-lg-right"><a href="#top">Back to top</a></li>
            </ul>
            <p><a href="{{route('/')}}">KLM Project</a> Edited By <a href="https://www.instagram.com/mush_60/" target="_blank">Mush 60</a>.</p>
            <p><a href="https://getbootstrap.com" rel="nofollow">Bootstrap</a> By <a href="https://thomaspark.co">Thomas Park</a>.</p>
          </div>
        </div>

      </footer>


    </div>


    <script src="{{asset('/dist/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/bwatch/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/bwatch/js/popper.min.js')}}"></script>
    <script src="{{asset('/bwatch/js/custom.js')}}"></script>

    @yield('pagejs')
  </body>
</html>
