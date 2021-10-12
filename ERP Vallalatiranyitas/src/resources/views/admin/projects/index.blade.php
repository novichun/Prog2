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
           
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Projekt</th>
                    <th>Felelős</th>
                    <th width="280px">Műveletek</th>
                </tr>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id  }}</td>
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
          
            {!! $projects->links() !!}



@endsection