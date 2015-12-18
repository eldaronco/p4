@extends('layouts.master')

@section('title')
    Delete Schedule
@stop

@section('content')
    <h1>Delete Schedule</h1>
    <p>Are you sure you want to delete <em>{{$schedule->name}}</em>?</p>
    <p><a href='/schedules/delete/{{$schedule->id}}'>Yes</a></p><p><a href='/schedules/'>No!</a></p>
@stop
