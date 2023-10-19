    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class=" d-flex align-items-center">
                <img src="{{asset('client/img/lo.png')}}" height="100" alt="">
                <span style="font-weight: 900;  color:#012970;">FASHS-UAC</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{url('/')}}">Acceuil</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('service.index') }}">Services</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('relever.premiere') }}">Demande</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('admission.create') }}">Admissions</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('qui.somme') }}">Qui sommes-nous ?</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('contact') }}">Contactez-nous</a></li>
                    <li class="nav-link scrollto"><a href="{{ route('form.search') }}"><span><i class="bi bi-search"
                                    style="font-size: 18px;"></i></span></a>
                    </li>
                    <li><a class="getstarted scrollto" href="about">
                            <img src="{{asset('client/img/uac-remove.png')}}" height="100" alt="">
                        </a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->