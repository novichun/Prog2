@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Eszköz megtekintése</h1>


        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.eszkozok.index') }}" role="button">Vissza</a>
                </div>
            </div>
        </div>
       <br><br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Márka:</strong>
                    {{ $eszkozok->marka }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Eszköz:</strong>
                    {{ $eszkozok->eszkoz }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Azonosító:</strong>
                    {{ $eszkozok->id }}
                </div>
            </div>
        </div>


@endsection