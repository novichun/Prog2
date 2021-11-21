@extends('templates.main')

@section('content')

   
    @auth
    <h1 class="center-text">Köszöntjük a kezdőlapon {{ auth()->user()->name }}!</h1>
<div class="row" style="margin-bottom: 30px">
    
    <div class="col-md-5" style="text-align: center; background-color:white;">
        <h2>Szabad kapacitások</h2>
         <div id="chart" style="height: 300px;"></div>
         <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
         <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
         <script>
           const chart = new Chartisan({
             el: '#chart',
             url: "@chart('sample_chart')",
           });
         </script>
    </div>
    <div class="col-md-7" style="text-align: center; background-color:white;">
        <h2>Összes adat</h2>
         <div id="chart2" style="height: 300px;"></div>
         <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
         <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
         <script>
           const chart2 = new Chartisan({
             el: '#chart2',
             url: "@chart('osszes_chart')",
           });
         </script>
    </div>
    
</div>


<div class="card">
  <h2 style="text-align: center">Üzenetek</h2>
  <table class="table">
    <tr>
        <th>Feladó</th>
        <th>Tárgy</th>
        <th>Üzenet</th>
    </tr>
    @foreach ($uzenetek as $uzenet)
    <tr>

        <td>{{ $uzenet->kuldo }}</td>
        <td>{{ $uzenet->targy }}</td>
        <td>{{ $uzenet->uzenet }}</td>
        
    </tr>
    @endforeach
</table>

</div>
    
    
        @else
        <style>*,
          *::before,
          *::after {
            box-sizing: border-box;
          }
          
          body,
          html {
            height: 100%;
            font-family: 'Quicksand', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow: hidden;
          }
          
          body {
            background: rgba(30,29,31,1);
          background: -moz-linear-gradient(-45deg, rgba(30,29,31,1) 0%, #fd7e14 100%);
          background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(30,29,31,1)), color-stop(100%, #fd7e14));
          background: -webkit-linear-gradient(-45deg, rgba(30,29,31,1) 0%, #fd7e14 100%);
          background: -o-linear-gradient(-45deg, rgba(30,29,31,1) 0%, #fd7e14 100%);
          background: -ms-linear-gradient(-45deg, rgba(30,29,31,1) 0%, #fd7e14100%);
          background: linear-gradient(135deg, rgba(30,29,31,1) 0%, #fd7e14 100%);
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e1d1f', endColorstr='#df405a', GradientType=1 );
          }
          </style>
        <div class="center">
        <h1>Vállalatirányíátsi Rendszer</h1>
        <p style="color: black;">Made by Novák Dániel</p>
        <div style="text-align: center; font-size:20px">
        <a  href="{{ route('login') }}" style="color:white;" >Bejelentkezés</a>
    
        @if (Route::has('register'))
            <a href="{{ route('register') }}" style="color:white;">Regisztráció</a>
        @endif
      </div>
               </div>
              
    @endauth

@endsection
