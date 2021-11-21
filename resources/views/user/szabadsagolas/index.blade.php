@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Szabadságolás</h1>
        <div class="row">
            <div class="col-lg-12 margin-tb">
              
                <div style="text-align: center;">
                    <a class="btn btn-sm btn-success" href=" {{ route('user.szabadsagolas.create') }}" role="button">Új kérelem beküldése</a>
                </div>
            </div>
        </div>
        



        
        <div class="row" style="align-content: center">
            @foreach ($sajat as $kerelmek)
                   
                        <div class="col-md-5 card" style="margin: 20px">
                            <h2 style="text-align: center;">
                                Kérelem azonosító: {{ $kerelmek->id }}
                            </h2>
                            <p>
                                <b>Tárgy: </b>{{ $kerelmek->targy }}
                            </p>
                            <p>
                                <b>Leírás: </b>{{ $kerelmek->leiras }}
                            </p>
                            <p><b>Szabadság kedete:</b> {{ $kerelmek->kezdet }}
                            </p>
                            <p>
                                <b>Szabadság vége: </b>{{ $kerelmek->veg }}
                            </p>
                            <p>
                                <b>Állapot: </b>
                                
                                @if($kerelmek->biralat == 1)         
              <a style="color: green; font-weight:600;">Elfogadva</a>
              @elseif($kerelmek->biralat == 2)  
              <a style="color: red; font-weight:600;"> Elutasítva</a>
@else
<a style="color: blue; font-weight:600;"> Függőben  </a>
@endif

                            </p>
                           
                        </div>
                   
                    @endforeach
                </div>

               
      
          
      
    


@endsection