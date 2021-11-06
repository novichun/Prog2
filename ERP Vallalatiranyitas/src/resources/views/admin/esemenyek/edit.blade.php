@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Esemény szerkesztése</h1>


        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.esemenyek.index') }}" role="button">Vissza</a>
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
        <form action="{{ route('admin.esemenyek.update',$esemenyek->id) }}" method="POST">
            @csrf
            @method('PUT')
       





            
              <div class="form-group row">
                <label for="textarea" class="col-4 col-form-label">Esemény</label> 
                <div class="col-8">
                  <input type="text" id="cim" name="cim" cols="5" rows="5" class="form-control" value="{{ $esemenyek->cim }}" >
                </div>
              </div>
              <div class="form-group row">
                <label for="textarea" class="col-4 col-form-label">Leírás</label> 
                <div class="col-8">
                  <textarea id="leiras" name="leiras" cols="5" rows="5" class="form-control">{{ $esemenyek->leiras }}</textarea>
                </div>
              </div>
             <div class="form-group row">
              <label for="textarea" class="col-4 col-form-label">Dátum</label> 
              <div class="col-8">
                      <input type="date" class="form-control {{$errors->has('datum') ? 'is-invalid' : ''}}" placeholder="Írja be a Dátumot" name="datum">
                      <div class="invalid-feedback">{{$errors->first('datum')}}</div>
                  </div>
              </div>
  
              
              
              <div class="form-group row">
                <div class="offset-4 col-8">
                  <button name="submit" type="submit" class="btn btn-primary">Feladat kiosztása</button>
                </div>
              </div>
       
        </form>



@endsection