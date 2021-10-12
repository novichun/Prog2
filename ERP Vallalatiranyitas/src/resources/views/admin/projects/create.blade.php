@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Projekt hozzáadás</h1>


        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.projects.index') }}" role="button">Vissza</a>
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
           <br> <br> <br>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
          
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Projekt Neve:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Név">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Felelős:</strong>
                        <textarea class="form-control" style="height:150px" name="felelos" placeholder="Felelős"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Létrehozás</button>
                </div>
            </div>
           
        </form>



@endsection