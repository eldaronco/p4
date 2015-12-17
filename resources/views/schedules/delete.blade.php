@extends('layouts.master')

@section('title')
    Delete Schedule
@stop

@section('content')
    <h1>Delete Activity</h1>
    <p>Are you sure you want to delete <em>{{$schedule->name}}</em>?</p>
    <p><a href='/schedules/delete/{{$schedule->id}}'>Yes</a></p><p><a href='/schedules/index/'>No!</a></p>
@stop
