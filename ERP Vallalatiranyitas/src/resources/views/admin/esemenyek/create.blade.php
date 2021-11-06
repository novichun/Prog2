@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Esemény létrehozása</h1>
        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.esemenyek.index') }}" role="button">Vissza</a>
                </div>
            </div>
        </div>
        <br><br><br><br>

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
        <form action="{{ route('admin.esemenyek.store') }}" method="POST">
            @csrf
            
            <div class="form-group row">
                <label for="select" class="col-4 col-form-label">Esemény</label> 
                <div class="col-8">
                  <textarea id="cim" name="cim" cols="40" rows="1" class="form-control"></textarea>
                </div>
              </div>
            <div class="form-group row">
              <label for="textarea" class="col-4 col-form-label">Leírás</label> 
              <div class="col-8">
                <textarea id="leiras" name="leiras" cols="40" rows="5" class="form-control"></textarea>
              </div>
            </div>
           <div class="form-group row">
            <label for="textarea" class="col-4 col-form-label">Dátum</label> 
            <div class="col-8">
                    <input type="date" class="form-control {{$errors->has('datum') ? 'is-invalid' : ''}}" placeholder="Írja be a határidőt" name="datum">
                    <div class="invalid-feedback">{{$errors->first('datum')}}</div>
                </div>
            </div>

      

            
            
            <div class="form-group row">
              <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Létrehozás</button>
              </div>
            </div>
          </form>

        
           
           
        



@endsection