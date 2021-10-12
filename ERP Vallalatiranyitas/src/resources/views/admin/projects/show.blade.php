@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Projekt megtekintése</h1>


        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.projects.index') }}" role="button">Vissza</a>
                </div>
            </div>
        </div>
       <br><br><br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Projekt neve:</strong>
                    {{ $project->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Felelős:</strong>
                    {{ $project->felelos }}
                </div>
            </div>
        </div>


@endsection