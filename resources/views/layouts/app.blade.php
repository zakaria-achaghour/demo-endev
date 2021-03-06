<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   

    <!-- Styles-->
  
    <link href="{{ asset('css\bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('fonts\css\all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts\webfonts\all.min.css') }}" rel="stylesheet">

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css" integrity="sha512-Ok8cRZATfQ1eP0n90TyzhngMiBwgTv/H9CGpqoqHNHfecTORN9ExMo6rxcQSowCX9i1rpz+JVvFJD+IBmHJkyw==" crossorigin="anonymous" />
    
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_endev.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                       
                      @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('formations.index') }}">Formations</a>
                        </li>
                        @can('mesFormations', User::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mes_formations') }}">Mes Formations</a>
                        </li>
                        @endcan

                        @can('session.manage', User::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.sessions.index') }}">Sessions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('participants.index') }}">Participant</a>
                        </li>
                        @endcan
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                          
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('user.manage', User::class)
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        users managment
                                    </a>
                                     
                                    @endcan
                                    @can('session.manage', User::class)
                                    <a class="dropdown-item" href="{{ route('admin.attestation') }}">
                                        Attestation
                                        <?php   $nb_demande = DB::table('users')
                                        ->join('session_user','users.id','session_user.user_id')
                                        ->where('status','demande')
                                        ->count()
                                        ;?>
                                        <span class="badge badge-pill badge-danger">{{ $nb_demande }}</span>
                                    </a>
                                    @endcan

                                   
                                    
                                    <a class="dropdown-item" href="{{ route('edit',['user' => Auth::id()]) }}">
                                        Edit Profile
                                    </a>
                                  
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"> @include('partials.alerts')</div>
                </div>
           
            @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('js/jQuery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js" integrity="sha512-ffrlJUspXYOW6r1y8tWOJHIE6yRUsbq6ESHxcUNU9NU9GWDZ+sS9zlb5SvKqeMEw8XSJXyDLz59PZFIqHHpJBQ==" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    
  



    </body>
</html>
