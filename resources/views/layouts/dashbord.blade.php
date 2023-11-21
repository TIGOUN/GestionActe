<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FASHS-UAC</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('client/img/favicon.png')}}" rel="icon">
    <link href="{{asset('client/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('client/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('client/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
        integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>
    .kbw-signature {
        width: 100%;
        height: 200px;
    }

    #sig canvas {
        width: 100% !important;
        height: auto;
    }
    </style>
</head>

<body>

    <main id="main">


        @yield('content')

    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Pied de page -->
    @include('footers.footer')
    <!-- Vendor JS Files -->
    <script src="{{asset('client/vendor/purecounter/purecounter_vanilla.js')}}">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script src="{{asset('client/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('client/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('client/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('client/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('client/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('client/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @include('flashy::message')
</body>

</html>