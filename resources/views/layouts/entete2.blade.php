<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Sénateurs et Députés</title>

    <link href="{{asset('assets/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/bootstrap-5.2.3-dist//css//bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{asset('assets/bootstrap-5.2.3-dist//css//bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fontawesome-free-6.2.1-web/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/bootstrap-5.2.3-dist/css/sidebars.css')}}" rel="stylesheet">
    <link href="{{asset('assets/cdnjs/toastr.min.css')}}">
</head>
<body>
    <nav id="barmenu" class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" [routerLink]="['/accueil']" routerLinkActive="router-link-active" >APP HTS TECHNOLOGIE</a>

          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Fermer le menu </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
          </div>
        </div>
      </nav>


    <div class="container-fluid mt-5">
      @yield('content')
    </div>
    <script src="{{asset('assets/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.2.3-dist/js/sidebars.js')}}"></script>
    <script src="{{asset('assets/cdnjs/toastr.min.js')}}"></script>

</body>
</html>

