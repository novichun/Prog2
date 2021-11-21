@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Feladat Kiosztása</h1>
        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div class="pull-right">
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.tasks.index') }}" role="button">Vissza</a>
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
        <form action="{{ route('admin.tasks.store') }}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="select" class="col-4 col-form-label">Alkalmazott</label> 
              <div class="col-8">
                <select id="alkalmazott" for="exampleFormControlSelect1" name="alkalmazott" required="required" class="custom-select">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group row">
                <label for="select" class="col-4 col-form-label">Projekt</label> 
                <div class="col-8">
                  <select id="projekt" for="exampleFormControlSelect1" name="projekt" required="required" class="custom-select">
                      @foreach($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
            <div class="form-group row">
              <label for="textarea" class="col-4 col-form-label">Feladat</label> 
              <div class="col-8">
                <textarea id="feladat" name="feladat" cols="40" rows="5" class="form-control"></textarea>
              </div>
            </div>
           <div class="form-group row">
            <label for="textarea" class="col-4 col-form-label">Határidő</label> 
            <div class="col-8">
                    <input type="date" class="form-control {{$errors->has('hatarido') ? 'is-invalid' : ''}}" placeholder="Írja be a határidőt" name="hatarido">
                    <div class="invalid-feedback">{{$errors->first('hatarido')}}</div>
                </div>
            </div>

      

            
            
            <div class="form-group row">
              <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Feladat kiosztása</button>
              </div>
            </div>
          </form>

        
           
           
        



@endsection