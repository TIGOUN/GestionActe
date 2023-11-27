<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="favicon.ico"> -->
    <title>Tableau de Bord - FASHS-UAC</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/quill.snow.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('admin/css/app-dark.css')}}" id="darkTheme" disabled>
</head>

<body class="vertical  light">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>


            <div class="text-center">
                <h5>Vous etes connecté(e) {{ Auth::user()->name }}</h5>
            </div>


            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16" style="font-size: 20px;"></i>
                    </a>
                </li>

                @unless(auth()->user()->unreadNotifications->isEmpty())
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16" style="font-size: 20px;"></span>
                        <span class=""><b>{{auth()->user()->unreadNotifications->count()}} notification(s)</b></span>
                    </a>
                </li>
                @endunless

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="{{ asset('/admin/456283.png') }}" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <!-- <a class="dropdown-item" href="#">Profile</a> -->

                        <a class="dropdown-item" style="font-size: 18px;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </nav>


        <!-- Fenetre de notifications -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" height="100%">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">

                                    <div class="col">
                                        <small><strong>{{ $notification->data['message'] }}</strong></small>
                                        <small
                                            class="badge badge-pill badge-light text-muted">{{ $notification->created_at }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Tout
                        effacer</button>
                </div>
            </div>
        </div>
    </div>








    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">

            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
                    <img src="{{asset('client/img/lo.png')}}" height="100" width="100" alt="" srcset="">
                </a>
            </div>









            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Tableau de bord</span><span
                            class="sr-only"></span>
                    </a>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Administrations</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">

                @can('Demande-list')
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('demande.index') }}">
                        <i class="fe fe-clipboard fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Toutes
                            les demandes</span>
                    </a>
                </li>
                @endcan


                @can('Admission-list')
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('admission.index') }}">
                        <i class="fe fe-file-text fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Admissions</span>
                    </a>
                </li>
                @endcan


                <li class="nav-item dropdown">
                    <a href="#ui-elements-pro" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-share-2 fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Publiers</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-pro">
                        @can('post-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.blog.index') }}">
                                <i class="fe fe-globe fe-16"></i>
                                <span class="ml-3 item-text">Articles</span>
                            </a>
                        </li>
                        @endcan

                        @can('ProgrammationEvaluation-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('evaluation.index') }}">
                                <i class="fe fe-book-open fe-16"></i>
                                <span class="ml-3 item-text">Examens</span>
                            </a>
                        </li>
                        @endcan

                        @can('ProgrammationSoutenance-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('soutenance.index') }}">
                                <i class="fe fe-award fe-16"></i>
                                <span class="ml-3 item-text">Soutenances</span>
                            </a>
                        </li>
                        @endcan

                        @can('ResultatSemestrielle-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('resultat.index') }}">
                                <i class="fe fe-airplay fe-16"></i>
                                <span class="ml-3 item-text">Résultats</span>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>

                @can('Acte-create')
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('acte.index') }}">
                        <i class="fe fe-layers fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Actes académiques</span>
                    </a>
                </li>
                @endcan

                @can('Departement-list')
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('departement.index') }}">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Départements</span>
                    </a>
                </li>
                @endcan

                @can('user-list')
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Paramètres</span>
                </p>

                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fe fe-user-plus fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Utilisateurs</span>
                    </a>
                </li>
                @endcan

                <!-- @can('role-list') -->
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <i class="fe fe-key fe-16"></i>
                        <span class="ml-3 item-text" style="font-size: 18px;">Roles</span>
                    </a>
                </li>
                <!-- @endcan -->
            </ul>

        </nav>
    </aside>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row">
                @include('flash.flashy')
                @yield('content')
            </div> <!-- .row -->
        </div>
        <!-- .container-fluid -->
    </main>
    <!-- main -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @include('flashy::message')


    <script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();

        var urlToredirect = ev.currentTarget.getAttribute('href');

        swal({
            title: "Etes-vous sur de vouloir supprimer ?",
            text: "Cette action est irréversible.",
            icon: "warning",
            buttons: true,
            dangerMode: true,

        }).then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToredirect;
            }
        });
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- .wrapper -->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/js/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('admin/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('admin/js/config.js')}}"></script>
    <script src="{{asset('admin/js/d3.min.js')}}"></script>
    <script src="{{asset('admin/js/topojson.min.js')}}"></script>
    <script src="{{asset('admin/js/datamaps.all.min.js')}}"></script>
    <script src="{{asset('admin/js/datamaps-zoomto.js')}}"></script>
    <script src="{{asset('admin/js/datamaps.custom.js')}}"></script>
    <script src="{{asset('admin/js/Chart.min.js')}}"></script>
    <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{asset('admin/js/gauge.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/js/apexcharts.custom.js')}}"></script>
    <script src="{{asset('admin/js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('admin/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.steps.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.timepicker.js')}}"></script>
    <script src="{{asset('admin/js/dropzone.min.js')}}"></script>
    <script src="{{asset('admin/js/uppy.min.js')}}"></script>
    <script src="{{asset('admin/js/quill.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
    /* DATATABLE */
    $(document).ready(function() {

        $('#dataTable-1').DataTable({
            "order": [
                [0, "desc"]
            ],
            "columnDefs": [{
                "targets": [0],
                "searchable": true
            }],
            "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Aucun enregistrement disponible",
                "info": "Afficher page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "infoFiltered": "(filtré à partir de _MAX_ enregistrements au total)",
                "sSearch": "Rechercher:",
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant"
                }
            },
        });
    });
    </script>


    <script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });
    $('.select2-multi').select2({
        multiple: true,
        theme: 'bootstrap4',
    });
    $('.drgpicker').daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale: {
            format: 'MM/DD/YYYY'
        }
    });
    $('.time-input').timepicker({
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
    });
    /** date range picker */
    if ($('.datetimes').length) {
        $('.datetimes').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        }
    }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
    });
    $('.input-zip').mask('00000-000', {
        placeholder: "____-___"
    });
    $('.input-money').mask("#.##0,00", {
        reverse: true
    });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        },
        placeholder: "___.___.___.___"
    });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{
                    'header': 1
                },
                {
                    'header': 2
                }
            ],
            [{
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }
            ],
            [{
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }
            ],
            [{
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }
            ], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            [{
                    'color': []
                },
                {
                    'background': []
                }
            ], // dropdown with defaults from theme
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
    <script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
        var uppy = Uppy.Core().use(Uppy.Dashboard, {
            inline: true,
            target: uptarg,
            proudlyDisplayPoweredByUppy: false,
            theme: 'dark',
            width: 770,
            height: 210,
            plugins: ['Webcam']
        }).use(Uppy.Tus, {
            endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) => {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
    </script>
    <script src="{{asset('admin/js/apps.js')}}"></script>
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