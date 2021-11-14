@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center;">Függőben lévő szabadságkérelmek</h1>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <div class="row">
            <div class="col-lg-12 margin-tb">
            
                <div class="pull-right">
                    
                    <a class="btn btn-sm btn-primary float-right" href=" {{ route('admin.biralat.naplo') }}" role="button">Elbírált szabadságkérelmek</a>
              </div>
            </div>
        </div>


        <div class="row" style="align-content: center">
            @foreach ($fuggok as $fugg)
                   
                        <div class="col-md-5 card" style="margin: 20px">
                            <h2 style="text-align: center;">
                                Kérelem azonosító: {{ $fugg->id }}
                            </h2>
                            @foreach ($fugg->users as $felhasznalo)
                            <p>
                                <b>Kérelmet benyújtó: </b>{{ $felhasznalo->name}}
                            </p>
                            @endforeach
                            <p>
                                <b>Tárgy: </b>{{ $fugg->targy }}
                            </p>
                            <p>
                                <b>Leírás: </b>{{ $fugg->leiras }}
                            </p>
                            <p><b>Szabadság kedete:</b> {{ $fugg->kezdet }}
                            </p>
                            <p>
                                <b>Szabadság vége: </b>{{ $fugg->veg }}
                            </p>
                            <p>
                                <b>Állapot: </b>    Függőben
                            </p>
                            <a class="btn btn-success" href="biralat.elfogad/{{$fugg->id}}">Elfogad</a>
    
                            <a class="btn btn-danger" href="biralat.elutasit/{{$fugg->id}}">Elutasít</a>
                           
                        </div>
                   
                    @endforeach
                </div>


      
        
       


@endsection