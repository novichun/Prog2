@extends('templates.main')

@section('content')

<h1 class="center-text">Projektek</h1>

<a class="btn btn-sm btn-primary float-right" style="margin-right: 20px;" href=" {{ route('user.projektek') }}" role="button">Keresés visszaállítása</a>
<div class="col-md-4 ">
    <form action="{{ route('user.projektek') }}" method="GET">
    <div class="input-group">
      <input type="search" name="search" class="form-control">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Keresés</button>
      </span>
    </div>
    </form>
</div>

<br><br>
<div class="row">
    @foreach ($projects as $project)
    
    
    <div class="col-md-3 card">
        <h2 style="text-align: center;">
            {{ $project->name  }}
        </h2>
        <p>
            <b>Projektért felelős: </b>{{ $project->felelos }}
        </p>
        <a class="btn btn-info" href="{{ route('user.projektek-show',$project->id) }}">Részletek</a>
        
    </div>
 
    @endforeach
</div>

<div class="d-flex justify-content-center">
    {!! $projects->links() !!}
    </div>

@endsection