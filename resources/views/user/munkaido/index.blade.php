@extends('templates.main')

@section('content')

  
        <h1 style="text-align: center">Munkaidők</h1>


        <div class="row" style="text-align: center;">
            <div class="col-lg-12 margin-tb">
              
                
                    <a class="btn btn-sm btn-success"  href=" {{ route('user.munkaido.create') }}" role="button">Új bejelentés</a>
                
            </div>
        </div>
        <br><br>

        @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif



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