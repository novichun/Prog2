<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('APP_NAME', 'ERP')}}</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      
        
        <!-- Styles -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- js -->
        <script src="{{ asset('js/app.js') }}" defer></script>
       
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
       


        <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
        <link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />
      <script src='/assets/demo-to-codepen.js'></script>
      
      <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
        <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
      

        

    

    </head>
    <body>
      
    <nav class="navbar navbar-expand-lg ">
                <div class="container">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">{{config('APP_NAME', 'ERP')}}</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="form-inline my-2 my-lg-0">
            @if (Route::has('login'))
                        <div>
                            @auth
                            
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="height: 32px; width:32px; margin-right:10px; border-radius:50%;">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profil</a></li>
                                  <div class="dropdown-divider"></div>
                                  <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Kijelentkezés</a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </ul>
                              </div>
             
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
</nav>

@can('logged-in')

<nav class="navbar sub-nav navbar-expand-lg ">
    <div class="container">

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto mb-2 mb-lg-0">
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Kezdőlap</a>
    </li>

    @can('is-admin')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('admin.users.index') }}">Felhasználók</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('admin.projects.index') }}">Projekt hozzáadás</a>
          <a class="dropdown-item" href="{{ route('admin.tasks.index') }}">Feladat kiosztás</a>
          <a class="dropdown-item" href="{{ route('admin.eszkozok.index') }}">Eszközök</a>
          <a class="dropdown-item" href="{{ route('admin.esemenyek.index') }}">Események</a>
          <a class="dropdown-item" href="{{ route('admin.biralat.index') }}">Szabadságkérelmek</a>
        </div>
    @endcan
    

    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.naptar') }}">Naptár</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.feladatok') }}">Feladatok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.projektek') }}">Projektek</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.kirendeles') }}">Kirendelés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.szabadsagolas.index') }}">Szabadságolás</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.dokumentumok.index')}}">Dokumentumok</a>
                        </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.felhasznalok.felhasznalok') }}">Elérhetőségek</a>
                </li>


</ul>

     </div>

</div>
</nav>
@endcan



    <main class="container">
        @include('admin.users.partials.alerts')
        @yield('content')
    </main>
   
  
    </body>
</html>
