@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Projektek</h1>
<br>
<br>
        <div class="container" style="display: block;">

          
                 
             
                    <a class="btn btn-sm btn-success float-right" href=" {{ URL::to('admin/project/create') }}" role="button">Új projekt</a>
          

          
         
          @if (Session::has('message'))
              <div class="alert alert-info">{{ Session::get('message') }}</div>
          @endif
          
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>ID</td>
                      <td>Projekt</td>
                      <td>Felelős</td>
                      <td>Kezdet</td>
                      <td>Műveletek</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($projects as $key => $value)
                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->felelos }}</td>
                      <td>{{ $value->created_at }}</td>
          
                      
                      <td>
          
                          
                         
                         
                          <a class="btn btn-small btn-info" href="{{ URL::to('#' . $value->id . '/edit') }}">Szerkesztés</a>
          
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
          
          </div>

@endsection