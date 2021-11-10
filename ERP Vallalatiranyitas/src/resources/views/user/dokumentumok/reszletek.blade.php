@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Dokumentumok</h1>
        <a class="btn btn-sm btn-primary float-right" href=" {{ route('user.dokumentumok.index') }}" role="button">Vissza</a>
<br><br>
        <div class="card" style="text-align: center;">
               <div class="row" style="margin: auto;">
                   <h2 style="padding-right: 10px">Cím: {{$data->title}}</h2>
               </div>
               <div class="row" style="margin: auto;">
                   <h3 style="padding-right: 10px">Leírás: {{$data->description}}</h3>
               </div>
               
           
              <iframe 
  width="560"
  height="315"
  src="{{url('storage/'.$data->file)}}" style="margin:auto"></iframe>
            </div>


@endsection