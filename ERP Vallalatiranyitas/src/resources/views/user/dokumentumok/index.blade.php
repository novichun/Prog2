@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Dokumentumok</h1>

        <a class="btn btn-sm btn-success float-right" href=" {{ route('user.dokumentumok.create') }}" role="button">Feltöltés</a>
<br><br>
        <div class="card">
                <table class="table">
                    <tr>
                
                        <th>Feltöltés időpontja</th>
                        <th>Dokumentum</th>
                        <th>Leírás</th>
                        <th>Megtekintés</th>
                        <th>Letöltés</th>
                    </tr>
                    @foreach ($file as $key=>$data)
                    <tr>
    
                        <td>{{ $data->created_at }}</td>
                        <td>
                            
                            {{ $data->title }}
                        
                        </td>
                        <td>{{ $data->description }}</td>
                        <td><a href="dokumentumok.show/{{$data->id}}">Megtekintés</a></td>
                        <td><a href="dokumentumok.download/{{$data->file}}">Letöltés</a></td>
                    </tr>
                    @endforeach   
                </table>
                
            </div>


@endsection