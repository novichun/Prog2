@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Dokumentumok Feltöltése</h1>
        <a class="btn btn-sm btn-primary float-right" href=" {{ route('user.dokumentumok.index') }}" role="button">Vissza</a>
        <br><br>
        
        <div class="card col-md-8" style="margin:auto;text-align:center;">
                <form action="dokumentumok.create2" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       <h3 style="display:inline">Dokumentum neve: </h3> <input style="margin-bottom: 20px;" type="text" required="required" name="title" placeholder="Dokumentum neve"><br>
                       <h3 style="display:inline">Leírás:  </h3><input style="margin-bottom: 20px;"  required="required" type="text" name="description" placeholder="Leírás"><br>
                        <input  style="margin-bottom: 20px;" type="file" accept="image/*,.pdf,.txt" required="required" name="file"><br>
                        <input class="btn btn-sm btn-success" type="submit" value="Feltöltés">
                </form>
        </div>

@endsection