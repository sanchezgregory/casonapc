<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ferreteria') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Ferreteria') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (auth()->check())
                            <li><a href="{{ url('/account') }}">Usuarios</a></li>
                        @endif
                        @if (auth()->check() && Access::check(Auth::user()->role, 'tecnico'))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipos <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('createDevice') }}">Agregar</a></li>
                                        <li><a href=" {{ route('indexDevice') }}">Ver activos</a></li>
                                        <li><a href=" {{ route('indexDevice') }}">Ver inactivos</a></li>
                                        <li><a href="#">Editar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Agregar Incidencia</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Editar Incidencia</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('createCustomer') }}">Agregar</a></li>
                                        <li><a href=" {{ route('indexCustomer') }}">Ver clientes</a></li>
                                        <li><a href="#">Editar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">vender</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">devolucion</a></li>
                                    </ul>
                                </li>


                        @endif
                        @if (auth()->check() && Access::check(Auth::user()->role, 'admin'))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departamentos <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('createDepartment') }}">Agregar</a></li>
                                        <li><a href=" {{ route('indexDepartment') }}">Ver todos</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Status<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('createStatus') }}">Agregar</a></li>
                                        <li><a href=" {{ route('indexStatus') }}">Ver todos</a></li>
                                    </ul>
                                </li>
                            <li><a href="{{ url('admin/settings') }}">Admin</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
                <div class="col-md-8 col-md-offset-2">
                        @include('partials/errors')
                        @include('partials/success')
                </div>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function(e){

            var
                    verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                    horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                    'width='+popupSize.width+',height='+popupSize.height+
                    ',left='+verticalPos+',top='+horisontalPos+
                    ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
</body>
</html>
