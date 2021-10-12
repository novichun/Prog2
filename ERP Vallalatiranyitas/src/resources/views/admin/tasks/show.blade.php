@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Feladat megtekintése</h1>


        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.tasks.index') }}" role="button">Vissza</a>
                </div>
            </div>
        </div>
       <br><br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Feladatot elvégző:</strong>
                    {{ $Task->alkalmazott }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Projekt:</strong>
                    {{ $Task->projekt }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Feladat</strong>
                    {{ $Task->feladat }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Határidő:</strong>
                    {{ $Task->hatarido }}
                </div>
            </div>
        </div>


@endsection