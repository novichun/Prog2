@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Eszközök</h1>


 
        <div class="row">
            <div class="col-lg-12 margin-tb">
            
                <div class="pull-right">
                    
                    <a class="btn btn-sm btn-success float-right" href=" {{ route('admin.eszkozok.create') }}" role="button">Új Eszköz</a>
                    <a class="btn btn-sm btn-primary float-right" style="margin-right: 20px;" href=" {{ route('admin.eszkozok.index') }}" role="button">Keresés visszaállítása</a>
                </div>
            </div>
        </div>
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
<br><br>


<div class="col-md-4 ">
    <form action="{{ route('admin.eszkozok.index') }}" method="GET">
    <div class="input-group">
      <input type="search" name="search" class="form-control">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Keresés</button>
      </span>
    </div>
    </form>
</div>

  <br><br>

<div class="row" style="align-content: center">
@foreach ($eszkozok as $eszkoz)
       
            <div class="col-md-3 card" style="margin: 20px">
                <h2 style="text-align: center;">
                    {{ $eszkoz->eszkoz }}
                </h2>
                <p>
                    <b>Márka: </b>{{ $eszkoz->marka }}
                </p>
                <p><b>Éppen itt használják:</b> 
                    @forelse($eszkoz->projects as $project)
                    {{$project->name}}
                    @empty
                     Raktáron van
                @endforelse
                </p>
                <p>
                    <b>Azonosító: </b>{{ $eszkoz->id }}
                </p>
                <form style="text-align: center" action="{{ route('admin.eszkozok.destroy',$eszkoz->id) }}" method="POST">
       
                    <a class="btn btn-info" href="{{ route('admin.eszkozok.show',$eszkoz->id) }}">Nézet</a>
    
                    <a class="btn btn-primary" href="{{ route('admin.eszkozok.edit',$eszkoz->id) }}">Szerkesztés</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Törlés</button>
                </form>
            </div>
       
        @endforeach
    </div>
        <div class="d-flex justify-content-center">
        {!! $eszkozok->links() !!}
        </div>


@endsection