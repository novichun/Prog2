@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Eszköz hozzáadás</h1>


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
           <br> <br> <br>
        <form action="{{ route('admin.eszkozok.store') }}" method="POST">
            @csrf
          
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Márka:</strong>
                        <input type="text" name="marka" class="form-control" placeholder="Márka">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Eszköz:</strong>
                        <textarea class="form-control" style="height:150px" name="eszkoz" placeholder="Eszköz"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mennyiség:</strong>
                        <textarea class="form-control" style="height:150px" name="mennyiseg" placeholder="Mennyiség"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Létrehozás</button>
                </div>
            </div>
           
        </form>



@endsection