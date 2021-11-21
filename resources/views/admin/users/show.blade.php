@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
        <h1 class="float-left">Felhasználók</h1>
       <a class="btn btn-sm btn-primary float-right" style="margin-right: 20px;" href=" {{ route('admin.users.index') }}" role="button">Vissza</a>
        </div>
    </div>



<br>


  

  
      <div class="container" style="margin-bottom: 30px">
        <div class="row d-flex justify-content-around">
  
   

    
       
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
                <p><b>Telefonszáma:</b> {{ $user->phone }}</p>
                <p><b>Létrehozás:</b> {{ $user->created_at }}</p>
                <p><b>Jogosultságok:</b></p>
                @foreach ($jogoks as $role)
            
                <div class="form-check">
                  <input class="form-check-input" name="jogoks[]"
                          type="checkbox" style="visibility: visible; opacity:1;" onclick="return false;" value="{{ $role->id }}" id="{{ $role->name }}"
              @isset($user) @if(in_array($role->id, $user->jogoks->pluck('id')->toArray())) checked @endif @endisset>
                          <label class="form-check-label" for="{{ $role->name }}">
                          {{ $role->name }}
                          </label>
                </div>
                @endforeach
                
              </div>
          </div>

  </div>
</div>

@foreach ($user->tasks as $task)
    <div class="card" style="margin-bottom:30px;">
    <div class="task"><b>Feladat:</b> {{ $task->feladat }}</div>
    <div class="projekt"><b>Projekt:</b> 

        @foreach ($task->projects as $projekt)
        {{ $projekt->name }}
    @endforeach    
      
    </div>
    <div class="hatarido"><b>Határidő:</b> {{ $task->hatarido }}</div>
<div class="letrehozas"><b>Feladat létrehozásának ideje:</b> {{ $task->created_at }}</div>
    </div>
@endforeach
   

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<div id='calendar'></div>

<script>


    document.addEventListener('DOMContentLoaded', function() {

      var calendarEl = document.getElementById('calendar');
     
      var calendar = new FullCalendar.Calendar(calendarEl, {
        header:{
          left: 'title',
            right:'prev,next today'
        },
        plugins: [ 'dayGrid'],
        defaultView: ['dayGridMonth'],
       
        events : [
                  @foreach($munkaidok as $munkaido)
                  {
                      title : 'Kezdete: {{$munkaido->mettol}} \n Vége: {{$munkaido->meddig}} \n  \n Bejelentés ideje: \n {{$munkaido->updated_at}}', 
                      start : '{{$munkaido->nap}}',
                      color: 'green',
                    url: "munkaido.edit/{{$munkaido->id}}",
    

                      
                  },
                  @endforeach
                  
                  
              ],
      
             
      });
  
      calendar.render();
    });
    
          </script>


@endsection