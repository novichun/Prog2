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
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row justify-content-md-center" style="text-align: center;">
    <div class="col col-lg-5 card" style="margin: 20px">
      <h2>Adatok:</h2>
      <strong>Projekt neve:</strong>
      {{ $project->name }}
      <strong>Felelős:</strong>
      {{ $project->felelos }} 
    </div>
    <div class="col-md-auto col-lg-5 card" style="margin: 20px">
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
            @if($project->id == 1)
            
            @else
            <td>
                <form action="{{ action('EszkozokController@vissza',$eszkoz->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">RAKTÁR</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
</table>





       
    

    </div>



    





    


  

<div class="col col-lg-5 card" style="margin: 20px">
    <h2>Dokumentumok:</h2>
    <table>
        <tr>
           <td style="font-weight: 600;s">Dokumentum</td>
           <td style="font-weight: 600;">Leírás</td>
           <td style="font-weight: 600;">Megtekintés</td>
        </tr>
    @foreach ($project->documents as $document)
    <tr>
        <td>{{$document->title}}</td>
        <td>{{$document->description}}</td>
        <td><a class="btn btn-sm btn-primary float-right" href="../dokumentumok.show/{{$document->id}}" role="button">Részletek</a></td>
    </tr>
    @endforeach
   </table>
   </div>

   <div class="col col-lg-5 card" style="margin: 20px">
    <h2>Gépek:</h2>
    <table>
        <tr>
           <td style="font-weight: 600;s">Márka</td>
           <td style="font-weight: 600;">Típus</td>
           <td style="font-weight: 600;">Leírás</td>
        </tr>
    
   </table>
   </div>



   <div class="col-md-auto col-lg-10 card" style="margin: 20px">
    <h2>Feladatok:</h2>

<table style="text-align: center;">
    <tr>
        <th>Alkalmazott</th>
        <th>Feladat</th>
        <th>Határidő</th>
    </tr>
    @foreach ($project->tasks as $task)
    <tr>
        <td>
            @foreach ($task->users as $projekt)
            {{ $projekt->name }}
        @endforeach       
        </td>
        <td>{{$task->feladat}}</td>
        <td>{{$task->hatarido}}</td>
        
    </tr>
    @endforeach
</table>
</div>

</div>

@endsection