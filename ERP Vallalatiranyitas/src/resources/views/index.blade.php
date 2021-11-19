@extends('templates.main')

@section('content')

   
    @auth
    <h1 class="center-text">Köszöntjük a kezdőlapon {{ auth()->user()->name }}!</h1>
<div class="row">
    
    <div class="col-md-5" style="text-align: center">
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
    <div class="col-md-7" style="text-align: center">
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
        <div class="center">
        <h1>Vállalatirányíátsi Rendszer</h1>
        <p>Made by Novák Dániel</p>
               </div>
    @endauth

@endsection
