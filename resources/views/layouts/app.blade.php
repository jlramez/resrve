<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <script>
        baseURL={!! json_encode(url('/')) !!}
    </script> 
     @livewireStyles
</head>
  
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth()
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-calendar"></i>  
                         Calendar
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @foreach($commonareas as $row)
                            <div wire:key="{{ $row->id }}">
                                <a href="{{ url('/evento/'.$row->id) }}" class="dropdown-item">{{$row->name}} </a>
                            </div>    
                            @endforeach
                        </ul>
                    </div>
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link"><i class="fa-solid fa-users"></i> Users</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/permissions') }}" class="nav-link"><i class="fa-solid fa-lock"></i> Permissions</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/roles') }}" class="nav-link"><i class="fa-solid fa-user-lock"></i> Roles</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/commonareas') }}" class="nav-link"><i class="fa-solid fa-building"></i> Common areas</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/events') }}" class="nav-link"><i class="fa-solid fa-list-check"></i> Reservations</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/status') }}" class="nav-link"><i class="fa-solid fa-circle-check"></i> Payment status</a> 
                            </li>
                        </ul>
                    @endauth()
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    @livewireScripts
    <script type="module">   
    document.addEventListener('DOMContentLoaded', () => 
    {
        var addModal = new bootstrap.Modal('#createDataModal');
        var editModal = new bootstrap.Modal('#updateDataModal');
        var commentModal = new bootstrap.Modal('#addcommentModal');
        var addNotModal = new bootstrap.Modal('#addnotificationModal');
        var evento = new bootstrap.Modal('#evento');
        
        window.addEventListener('closeModal', () => {
           addModal.hide();
           editModal.hide();
           commentModal.hide();
           addNotModal.hide();
           evento.hide();
           
        })
    });
    </script>
</body>
</html>
