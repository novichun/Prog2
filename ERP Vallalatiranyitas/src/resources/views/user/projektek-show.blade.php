@extends('templates.main')

@section('content')

<h1 class="center-text">Projekt megtekintése</h1>


<div class="row">
    <div class="col-lg-12 margin-tb">
      
        <div class="pull-right">
            <a class="btn btn-sm btn-primary float-right" href=" {{ route('user.projektek') }}" role="button">Vissza</a>
        </div>
    </div>
</div>
<br>


<div class="row justify-content-md-center" style="text-align: center;">
    <div class="col col-lg-3 card" style="margin: 20px">
      <h2>Adatok:</h2>
      <strong>Projekt neve:</strong>
      {{ $project->name }}
      <strong>Felelős:</strong>
      {{ $project->felelos }} 
    </div>
    <div class="col-md-auto col-lg-3 card" style="margin: 20px">
        <h2>Eszközök:</h2>

<table style="text-align: center;">
        <tr>
            <th>Eszköz</th>
            <th>Márka</th>
            <th>Azonosító</th>
        </tr>
        @foreach ($project->eszkozoks as $eszkoz)
        <tr>
            <td>{{$eszkoz->eszkoz}}</td>
            <td>{{$eszkoz->marka}}</td>
            <td>{{$eszkoz->id}}</td>
        </tr>
        @endforeach
</table>


       
       
    

    </div>
    <div class="col col-lg-3 card" style="margin: 20px">
     <h2>Gépek:</h2>
    </div>
  </div>


@endsection