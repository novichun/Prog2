@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Eszközök kirendelése</h1>


        @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


        <div class="col-md-auto col-lg-10 card" style="margin: auto">
        <table style="text-align: center;">
                <tr>
                    <th>Eszköz</th>
                    <th>Márka</th>
                    <th>Azonosító</th>
                </tr>
                @foreach ($szabad->eszkozoks as $eszkoz)
                <tr>
                    <td>{{$eszkoz->eszkoz}}</td>
                    <td>{{$eszkoz->marka}}</td>
                    <td name="eszkozok" id="eszkozok">{{$eszkoz->id}}</td>
                    <td>
                        <form action="{{ action('KirendelesController@kirendeles',[$eszkoz->id])}}" method="GET">
                            <select id="projekt" for="exampleFormControlSelect1" name="projekt" required="required" class="custom-select">
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                              </select>
                       
                    </td>
                    
                        @csrf
                    <td><button type="submit" class="btn btn-success">Kirendelés</button></td>
                </form>
                </tr>
                @endforeach
        </table>
        
              
           
        
</div>


@endsection