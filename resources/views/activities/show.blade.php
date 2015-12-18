@extends('layouts.master')

@section('title')
    Show Activities
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop

@section('content')

<h1>Show Activities</h1>

@include('errors')

@if(sizeof($activities) == 0)
<div>You have not added any activities.</div>
@else

<table id='activity_table' class='table'>
    <thead>
        <tr>
            <th>Name</th><th>Description</th><th>Group</th><th>DOW</th><th>Time</th><th>Edit</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{ $activity->name }}</td>
            <td>{{ $activity->description }}</td>
            <td>{{ $activity->group->name }}</td>
            <td>{{ $activity->days }}</td>
            <td>{{ $activity->default_time }}</td>
            <td><a href='/activities/edit/{{$activity->id}}'>Edit</a></td>
            <td><a href='/activities/confirm-delete/{{$activity->id}}'>Delete</a></td>

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
