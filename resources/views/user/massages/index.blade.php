@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Üzenetek</h1>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary float-right" href=" {{ route('user.massages.create') }}" role="button">Új üzenet</a>
        </div>
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br><br>
    <div class="card">
        <table class="table">
          <tr>
              <th>Feladó</th>
              <th>Tárgy</th>
              <th>Üzenet</th>
          </tr>
          @foreach ($uzenetek as $uzenet)
          <tr>
      
              <td>{{ $uzenet->kuldo }}</td>
              <td>{{ $uzenet->targy }}</td>
              <td>{{ $uzenet->uzenet }}</td>
              
          </tr>
          @endforeach
      </table>
      
      </div>

@endsection