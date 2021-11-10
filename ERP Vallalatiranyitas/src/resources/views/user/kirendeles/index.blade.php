@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Eszközök kirendelése</h1>


        

        <form action="{{ route('user.kirendeles-vegrehajtas') }}" method="GET">
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
                        <form>
                            @csrf
                            <select id="projekt" for="exampleFormControlSelect1" name="projekt" required="required" class="custom-select">
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                              </select>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Kirendelés</button>
                </div>
           
        </form>
</div>


@endsection