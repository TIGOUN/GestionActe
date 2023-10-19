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

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-6 col-md-8 col-10 mx-auto" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                    <h2 class="my-3">S'inscrire</h2>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" id="inputEmail4">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nom</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="lastname">Lastname</label>
                        <input type="text" id ="lastname" class="form-control">
                    </div> -->
                </div>
                <hr class="my-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword5">Mot de passe</label>
                            <input type="password" id="inputPassword5"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Confirmation de mot de passe</label>
                            <input type="password" class="form-control" name="password_confirmation" required
                                autocomplete="new-password" id="inputPassword6">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Mot de passe require</p>
                        <p class="small text-muted mb-2"> Pour creer un mot de passe, il faut suivre les paramètres
                            suivants: </p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimum 8 caraactères </li>
                            <li>Au moins 1 caractère majuscule</li>
                            <li>Au moins 1 chiffre</li>
                            <li>Les deux mots de passe doivent etre identique</li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
                <p class="mt-5 mb-3 text-muted text-center">© 2023</p>
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