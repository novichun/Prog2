@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Dokumentumok Feltöltése</h1>

        <br><br>
        
        <div class="card col-md-8" style="margin:auto;text-align:center;">
                <form action="{{ action('DocumentController@store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       <h3 style="display:inline">Dokumentum neve: </h3> <input style="margin-bottom: 20px;" type="text" required="required" name="title" placeholder="Dokumentum neve"><br>
                       <h3 style="display:inline">Leírás:  </h3><input style="margin-bottom: 20px;"  required="required" type="text" name="description" placeholder="Leírás"><br>
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
                        <input  style="margin-bottom: 20px;" type="file" accept="image/*,.pdf,.txt" required="required" name="file"><br>
                        <input class="btn btn-sm btn-success" type="submit" value="Feltöltés">
                </form>
           
        </div>

@endsection