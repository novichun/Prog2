@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
        <h1 class="float-left">Felhasználók</h1>
       <a class="btn btn-sm btn-success float-right" href=" {{ route('admin.users.create') }}" role="button">Létrehozás</a>
        </div>
    </div>

    

    <div class="card">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Profilkép</th>
      <th scope="col">Név</th>
      <th scope="col">Email</th>
      <th scope="col">Telefonszám</th>
      <th scope="col">Műveletek</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
      <tr>
      <th scope="row"><img src="/uploads/avatars/{{ $user->avatar }}" style=" width:32x; height:32px; float:left; border-radius:50%; margin-right:25px;"></th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
      
      <td>

      <a class="btn btn-sm btn-primary" href=" {{ route('admin.users.edit', $user->id) }}" role="button">Szerkesztés</a>
      <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit()">
            Törlés
      </button>
        <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
        @csrf
        @method("DELETE")
    </form>
      </td>
    </tr>
      @endforeach
      
  </tbody>
</table>
{{ $users->links() }}
    </div>
@endsection