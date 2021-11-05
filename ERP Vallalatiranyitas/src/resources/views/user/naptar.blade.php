

@extends('templates.main')

@section('content')
<h1 class="center-text">Az ön naptára naptára {{ auth()->user()->name }}</h1>


<div class="container mt-5" style="max-width: 700px">
    <h2 class="h2 text-center mb-5 border-bottom pb-3">Laravel FullCalender CRUD Events Example</h2>
    <div id='full_calendar_events'></div>
</div>

{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function () {

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#full_calendar_events').fullCalendar({
            editable: true,
            editable: true,
            events: SITEURL + "/user/naptar",
            displayEventTime: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (created_at, hatarido, allDay) {
                var feladat = prompt('Event Name:');
                if (feladat) {
                    var created_at = $.fullCalendar.formatDate(created_at, "Y-MM-DD HH:mm:ss");
                    var hatarido = $.fullCalendar.formatDate(hatarido, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "/calendar-crud-ajax",
                        data: {
                            feladat: feladat,
                            created_at: created_at,
                            hatarido: hatarido,
                            type: 'create'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event created.");

                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                title: feladat,
                                start: created_at,
                                end: hatarido,
                                allDay: allDay
                            }, true);
                            calendar.fullCalendar('unselect');
                        }
                    });
                }
            },
            eventDrop: function (event, delta) {
                var created_at = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var hatarido = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                $.ajax({
                    url: SITEURL + '/calendar-crud-ajax',
                    data: {
                        title: event.feladat,
                        start: created_at,
                        end: hatarido,
                        id: event.id,
                        type: 'edit'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event updated");
                    }
                });
            },
            eventClick: function (event) {
                var eventDelete = confirm("Are you sure?");
                if (eventDelete) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event removed");
                        }
                    });
                }
            }
        });
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');            
    }

</script>



@endsection