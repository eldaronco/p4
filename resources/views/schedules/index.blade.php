@extends('layouts.master')

@section('title')
    Show Schedules
@stop
{{--
Simple view to display the schedules.  You can go to the Calendar View, Edit, or Delete from this view.
--}}

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop


@section('content')

<h1>Show Schedules</h1>

@include('errors')

@if(sizeof($schedules) == 0)
<div>You have not added any schedules.</div>
@else

<table id='schedule_table' class='table'>
    <thead>
        <tr>
            <th>Name</th><th>Start</th><th>Calendar View</th><th>Edit</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $schedule)
        <tr>
            <td>{{ $schedule->name }}</td>
            <td>{{ $schedule->start_dt}}</td>
            <td><a href='/schedules/calendar/{{$schedule->id}}'>Calendar View</a></td>
            <td><a href='/schedules/show/{{$schedule->id}}'>Edit</a></td>
            <td><a href='/schedules/confirm-delete/{{$schedule->id}}'>Delete</a></td>

        </tr>
        @endforeach
    </tbody>
</table>


@endif


@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
