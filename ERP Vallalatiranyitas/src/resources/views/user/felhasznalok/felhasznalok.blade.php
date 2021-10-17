@extends('templates.main')

@section('content')

  
        <h1 class="float-center">Elérhetőségek</h1>
<br>

        <div class="row">
                <div class="col-lg-12 margin-tb">
                
                   
                </div>
            </div>
           
           
            <div class="container" style="margin-bottom: 150px;">
                <div class="row">
          
            @foreach ($users as $user)

            
               
                  <div class="col-3 coverProfile mT20 col-xs-offset-2 dropShadow">
                   <div class="row">
                     <div class="col rel dropShadow">
                  <img class="img-fluid" src="/uploads/avatars/{{ $user->avatar }}">
                     </div>
                    </div>  
                    <div class="col rubyColor profileDetails ">
                        <h3 class="float-center">{{ $user->name }}</h3>
                        <hr style="border-color: white;">
                        <p><b>Email:</b> {{ $user->email }}</p>
                        <p><b>Létrehozás:</b> {{ $user->created_at }}</p>
                        
                      </div>
                  </div>
                  <div class="col"></div>
               

              @endforeach
                 
            </div>
        </div>


@endsection