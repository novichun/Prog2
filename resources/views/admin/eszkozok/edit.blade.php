@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Projekt szerkesztése</h1>


        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.eszkozok.index') }}" role="button">Vissza</a>
                </div>
            </div>
        </div>
       
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <br><br><br>
        <form action="{{ route('admin.eszkozok.update',$eszkozok->id) }}" method="POST">
            @csrf
            @method('PUT')
       
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Márka:</strong>
                        <input type="text" name="marka" value="{{ $eszkozok->marka }}" class="form-control" placeholder="Márka">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Eszköz:</strong>
                        <textarea class="form-control" style="height:auto" name="eszkoz" placeholder="Eszköz">{{ $eszkozok->eszkoz }}</textarea>
                    </div>
                </div>
              
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Szerkesztés</button>
                </div>
            </div>
       
        </form>



@endsection