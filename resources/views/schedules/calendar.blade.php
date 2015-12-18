@extends('layouts.master')

@section('title')
    Create Schedule
@stop

{{--
This view is simply for showing the calendar view of a chosen schedule.  It uses the FullCalendar jquery plug-in.
The getCalendar route will call (via a route) a function getCalendar in the Schedule controller that will create a json object containing an Array
with each activity, it's start date/time and end date/time for the given schedule.  It then sends that object back here to be rendered
in the calendar div.

--}}


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.min.css" rel="stylesheet" type="text/css" media="all">
<link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css" media="all">
<script src="/js/moment.min.js"></script>
<script src="/js/jquery-ui.custom.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.min.js"></script>

<script>
$(document).ready(function(){
    $url = "/schedules/getCalendar/";
    $dest = $url.concat({{ $schedule_id }});

    $.get($dest, function(data){
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            eventLimit: true,
            theme: true,
            defaultDate: data[0].start,
            events: data
        });
    });

});
</script>

@stop

@section('content')


<h1>View Schedule</h1>

@include('errors')

<div id="calendar"></div>


@stop


{{--
    This `body` section will be yielded right before the closing </body> tag.
    Use it to add specific things that *this* View needs at the end of the body,
    such as a page specific JavaScript files.
    --}}
    @section('body')


    @stop
