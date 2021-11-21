

@extends('templates.main')

@section('content')
<h1 class="center-text">Az ön naptára naptára {{ auth()->user()->name }}</h1>


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
        plugins: [ 'dayGrid' ],
        defaultView: ['dayGridMonth'],
       
        events : [
                  @foreach(auth()->user()->tasks as $task)
                  {
                      title : @foreach ($task->projects as $projekt)'{{ $projekt->name }}: {{ $task->feladat }}'@endforeach , 
                      start : '{{ $task->created_at }}',
                      color: '#'+(0x1000000+Math.random()*0xffffff).toString(16).substr(1,6),
                      url: '{{ route('user.feladatok') }}',
                      @if ($task->hatarido)
                              end: '{{ $task->hatarido }}',
                      @endif
                      
                  },
                  @endforeach
                  @foreach($esemenyek as $esemeny)
                  {
                      title : '{{ $esemeny->cim }}: {{ $esemeny->leiras }}',
                      start : '{{ $esemeny->datum }}',
                      color: 'green',
                      
                      
                  },
                  @endforeach
                  
              ],
      
             
      });
  
      calendar.render();
    });
    
          </script>

@endsection



