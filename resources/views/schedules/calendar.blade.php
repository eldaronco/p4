@extends('layouts.master')

@section('title')
    Create Schedule
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.min.css" rel="stylesheet" type="text/css" media="all">
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.print.css" rel="stylesheet" type="text/css" media="all">
<script src="/js/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.min.js"></script>

<script>

$(document).ready(function(){
    $.get("/schedules/testing/1", function(data){
        $('#calendar').fullCalendar({
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            eventLimit: true,
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
