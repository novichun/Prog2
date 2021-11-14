@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center;">Elbírált szabadságkérelmek</h1>

        <div class="row">
            <div class="col-lg-12 margin-tb">
            
                <div class="pull-right">
                    
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.biralat.index') }}" role="button">Vissza</a>
              </div>
            </div>
        </div>


        

      
                <div class="row" style="align-content: center">
                    @foreach ($elbiralt as $kerelmek)
                           
                                <div class="col-md-5 card" style="margin: 20px">
                                    <h2 style="text-align: center;">
                                        Kérelem azonosító: {{ $kerelmek->id }}
                                    </h2>
                                    @foreach ($kerelmek->users as $felhasznalo)
                                    <p>
                                        <b>Kérelmet benyújtó: </b>{{ $felhasznalo->name}}
                                    </p>
                                    @endforeach
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
                      Elfogadva
                      @elseif($kerelmek->biralat == 2)  
                      Elutasítva
        @else
              Függőben  
        @endif
        
                                    </p>
                                    <a class="btn btn-primary" href="biralat.visszavon/{{$kerelmek->id}}">Bírálat visszavonása</a>
                                </div>
                           
                            @endforeach
                        </div>
       


@endsection