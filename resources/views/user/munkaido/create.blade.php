@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Munkaidő bejelentés</h1>

        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('user.munkaido.index') }}" role="button">Vissza</a>
                </div>
            </div>
        </div>

        <br><br>

        @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<form action="{{ action('MunkaidokController@store') }}" method="POST">
    @csrf
    
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Nap</label> 
        <div class="col-8">
                <input type="date" max="{{$max}}" min="{{$min}}" class="form-control {{$errors->has('nap') ? 'is-invalid' : ''}}" placeholder="Írja be a határidőt" name="nap">
                <div class="invalid-feedback">{{$errors->first('nap')}}</div>
            </div>
        </div>
      <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Mettől</label> 
        <div class="col-8">
                <input type="time" value="08:00:00" class="form-control {{$errors->has('mettol') ? 'is-invalid' : ''}}" placeholder="Írja be a határidőt" name="mettol">
                <div class="invalid-feedback">{{$errors->first('mettol')}}</div>
            </div>
        </div>
   <div class="form-group row">
    <label for="textarea" class="col-4 col-form-label">Meddig</label> 
    <div class="col-8">
            <input type="time" class="form-control {{$errors->has('meddig') ? 'is-invalid' : ''}}" placeholder="Írja be a határidőt" name="meddig">
            <div class="invalid-feedback">{{$errors->first('meddig')}}</div>
        </div>
    </div>


    
    
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Bejelentés</button>
      </div>
    </div>
  </form>

        


@endsection