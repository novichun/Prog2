@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Új üzenet küldése</h1>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary float-right" href=" {{ route('user.massages.index') }}" role="button">Vissza</a>
        </div>
        <br><br>
          
        <form action="{{ action('MassagesController@store') }}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="fogado" class="col-3 col-form-label">Címzett:</label> 
              <div class="col-9">
                <select id="cimzett" name="cimzett" required="required" class="custom-select">
                    @foreach($users as $user)
                    <option >{{ $user->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3 col-form-label" for="targy">Tárgy:</label> 
              <div class="col-9">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-bullhorn"></i>
                    </div>
                  </div> 
                  <input id="targy" name="targy" type="text" required="required" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="uzenet" class="col-3 col-form-label">Üzenet:</label> 
              <div class="col-9">
                <textarea id="uzenet" name="uzenet" cols="40" rows="5" class="form-control" required="required"></textarea>
              </div>
            </div> 
            <div class="form-group row">
              <div class="offset-3 col-9">
                <button name="submit" type="submit" class="btn btn-primary">Küldés</button>
              </div>
            </div>
          </form>
          
  

@endsection