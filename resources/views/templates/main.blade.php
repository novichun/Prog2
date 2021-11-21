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
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      
        <!-- CSS Files -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="/assets/demo/demo.css" rel="stylesheet" />
        <script src="/assets/js/core/jquery.min.js"></script>


        <script src="/assets/js/core/jquery.min.js"></script>
        <script src="/assets/js/core/popper.min.js"></script>
    
        <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="/assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="/assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
        <script src="/assets/demo/demo.js"></script>
    </head>
    <body>
        <div class="wrapper ">
            @can('logged-in')
            <div class="sidebar" data-color="orange">
              <!--
                Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
            -->
              <div class="logo">
                <a class="simple-text logo-mini">
                    {{config('APP_NAME', 'ERP')}}
                </a>
                <a class="simple-text logo-normal">
                 Vállalatirányítás
                </a>
              </div>
              <div class="sidebar-wrapper" id="sidebar-wrapper" style="overflow: hidden;">
                <ul class="nav">
                  <li>
                    <a href="{{ url('/') }}">
                      <i class="now-ui-icons design_app"></i>
                      <p>Kezdőlap</p>
                    </a>
                  </li>
                  @can('is-admin')
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons education_atom"></i> Admin
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">Felhasználók</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.projects.index') }}">Projekt hozzáadás</a>
                        <a class="dropdown-item" href="{{ route('admin.tasks.index') }}">Feladat kiosztás</a>
                        <a class="dropdown-item" href="{{ route('admin.eszkozok.index') }}">Eszközök</a>
                        <a class="dropdown-item" href="{{ route('admin.esemenyek.index') }}">Események</a>
              
                        <a class="dropdown-item" href="{{ route('admin.biralat.index') }}">Szabadságkérelmek {{ config('uj'); }}új </a>
                      </div>
                  </li>
                  @endcan
                <li class="nav-item dropdown">
                                                
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons design-2_ruler-pencil"></i>Kirendelések
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.kirendeles') }}">Eszközök kirendelés</a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('user.felhasznalok.felhasznalok') }}">
                    <i class="now-ui-icons tech_headphones"></i>
                    <p>Elérhetőségek</p>
                    </a>
                </li>
                  
                  <li>
                    <a href="{{ route('user.naptar') }}">
                      <i class="now-ui-icons ui-1_calendar-60"></i>
                      <p>Naptár</p>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('user.projektek') }}">
                      <i class="now-ui-icons loader_gear"></i>
                      <p>Projektek</p>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('user.szabadsagolas.index') }}">
                      <i class="now-ui-icons objects_spaceship"></i>
                      <p>Szabadságolás</p>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('user.feladatok') }}">
                      <i class="now-ui-icons design_bullet-list-67"></i>
                      <p>Feladatok</p>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('user.munkaido.index') }}">
                      <i class="now-ui-icons ui-2_time-alarm"></i>
                      <p>Munkaidő</p>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('user.dokumentumok.index')}}">
                      <i class="now-ui-icons education_paper"></i>
                      <p>Dokumentumok</p>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="main-panel" id="main-panel">

                <nav class="navbar navbar-expand-lg " style="margin-bottom: 50px;">
                    <div class="container">
            <div class="container-fluid">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </button>
                  </div>
                <a class="navbar-brand" href="/"></a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="form-inline my-2 my-lg-0">
                @if (Route::has('login'))
                            <div>
                                @auth
                            

                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="height: 32px; width:32px; margin-right:10px; border-radius:50%;">
                                        {{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profil</a></li>
                                      <li><a class="dropdown-item" href="{{ route('user.massages.index') }}">Üzenetek</a></li>
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
    @endcan
              <div class="content">
               
              
                    @include('admin.users.partials.alerts')
                    @yield('content')
                

              </div>
              <footer class="footer">
                <div class=" container-fluid " >
                  <div class="copyright" id="copyright" >
                    &copy; <script>
                      document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>, Coded by Novák Dániel</a>.
                  </div>
                </div>
              </footer>
            </div>
          </div>


         

   




   

  
    </body>
</html>
