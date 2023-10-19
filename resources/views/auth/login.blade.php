<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="favicon.ico"> -->
    <title>Login - FASHS UAC Dashboard</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('dashbord/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('dashbord/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('dashbord/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('dashbord/css/app-light.css')}}" id="lightTheme">
</head>

<body class="">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto" method="POST" action="{{ route('login') }}">
                @csrf

                <h1 class="h6 mb-3 text-center">Se connecter</h1>
  
                <div class="form-group">
                    <label for="email" class="">Adresse email</label>
                    <input type="email" id="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        placeholder="Votre adresse mail" name="email" required="" autofocus="">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="inputPassword" class="text-md-start">Mot de passe</label>
                    <input type="password" id="inputPassword"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Votre mot de passe" required="">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Se souvenir de moi </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
                <p class="mt-5 mb-3 text-muted">© 2023 &nbsp;&nbsp;&nbsp;
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Mot de passe oublie ?</a>
                    @endif
                </p>
            </form>
        </div>
    </div>
    <script src="{{asset('dashbord/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashbord/js/popper.min.js')}}"></script>
    <script src="{{asset('dashbord/js/moment.min.js')}}"></script>
    <script src="{{asset('dashbord/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashbord/js/simplebar.min.js')}}"></script>
    <script src="{{asset('dashbord/js/daterangepicker.js')}}"></script>
    <script src="{{asset('dashbord/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('dashbord/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('dashbord/js/config.js')}}"></script>
    <script src="{{asset('dashbord/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>