@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Események</h1>

      
 
        <div class="row">
            <div class="col-lg-12 margin-tb">
            
                <div class="pull-right">
                    
                    <a class="btn btn-sm btn-success float-right" href=" {{ route('admin.esemenyek.create') }}" role="button">Új Eszköz</a>
                    <a class="btn btn-sm btn-primary float-right" style="margin-right: 20px;" href=" {{ route('admin.esemenyek.index') }}" role="button">Keresés visszaállítása</a>
                </div>
            </div>
        </div>
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
<br><br>


<div class="col-md-4 ">
    <form action="{{ route('admin.esemenyek.index') }}" method="GET">
    <div class="input-group">
      <input type="search" name="search" class="form-control">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Keresés</button>
      </span>
    </div>
    </form>
</div>

  <br><br>
  <div class="card">
  <table class="table">
    <tr>
        <th>Esemény</th>
        <th>Leírás</th>
        <th>Dátum</th>
        <th width="280px">Műveletek</th>
    </tr>
    @foreach ($esemenyek as $esemeny)
    <tr>

        <td>{{ $esemeny->cim }}</td>
        <td>{{ $esemeny->leiras }}</td>
        <td>{{ $esemeny->datum }}</td>
        <td>
            <form action="{{ route('admin.esemenyek.destroy',$esemeny->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('admin.esemenyek.edit',$esemeny->id) }}">Szerkesztés</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Törlés</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</div>
     
<div class="d-flex justify-content-center">
{!! $esemenyek->links() !!}
</div>


@endsection