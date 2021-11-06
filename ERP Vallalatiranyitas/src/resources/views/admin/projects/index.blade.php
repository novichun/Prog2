@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Projektek</h1>


        <div class="row">
                <div class="col-lg-12 margin-tb">
                
                    <div class="pull-right">
                        <a class="btn btn-sm btn-success float-right" href=" {{ route('admin.projects.create') }}" role="button">Új projekt</a>
                    </div>
                </div>
            </div>
           
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <br><br><br>
            <div class="card">
            <table class="table">
                <tr>
                    <th>Projekt</th>
                    <th>Felelős</th>
                    <th width="280px">Műveletek</th>
                </tr>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->felelos }}</td>
                    <td>
                        <form action="{{ route('admin.projects.destroy',$project->id) }}" method="POST">
           
                            <a class="btn btn-info" href="{{ route('admin.projects.show',$project->id) }}">Nézet</a>
            
                            <a class="btn btn-primary" href="{{ route('admin.projects.edit',$project->id) }}">Szerkesztés</a>
           
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
            {!! $projects->links() !!}
            </div>


@endsection