<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('APP_NAME', 'ERP')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- js -->
       <script src="{{ asset('js/app.js') }}" defer></script>
    

    </head>
    <body>

    <nav class="navbar navbar-expand-lg ">
                <div class="container">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{config('APP_NAME', 'ERP')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Kezdőlap</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">Felhasználók</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
            @if (Route::has('login'))
                        <div>
                            @auth
                                <a href="{{ url('/home') }}" >Kezdőlap</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Kijelentkezés</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" >Bejelentkezés</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Regisztráció</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
                 </div>
            </div>
        </div>
</nav>



    <main class="container">
        @include('admin.users.partials.alerts')
        @yield('content')
    </main>

    </body>
</html>
