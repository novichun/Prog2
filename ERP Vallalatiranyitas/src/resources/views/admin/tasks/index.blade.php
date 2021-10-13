@extends('templates.main')

@section('content')

  
        <h1 class="float-left">Feladatok</h1>


        <div class="row">
                <div class="col-lg-12 margin-tb">
                
                    <div class="pull-right">
                        <a class="btn btn-sm btn-success float-right" href=" {{ route('admin.tasks.create') }}" role="button">Új Feladat</a>
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
                    <th>Alkalmazott</th>
                    <th>Projekt</th>
                    <th>Feladat</th>
                    <th>Határidő</th>
                    <th width="280px">Műveletek</th>
                </tr>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id  }}</td>
                    <td>{{ $task->alkalmazott }}</td>
                    <td>{{ $task->projekt }}</td>
                    <td>{{ $task->feladat }}</td>
                    <td>{{ $task->hatarido }}</td>
                    <td>
                        <form action="{{ route('admin.tasks.destroy',$task->id) }}" method="POST">
           
                            <a class="btn btn-info" href="{{ route('admin.tasks.show',$task->id) }}">Nézet</a>
            
                            <a class="btn btn-primary" href="{{ route('admin.tasks.edit',$task->id) }}">Szerkesztés</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger">Törlés</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        
              
                 
            <div class="d-flex justify-content-center">
            {!! $tasks->links() !!}
            </div>


@endsection