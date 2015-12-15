@extends('layouts.master')

@section('title')
    Delete Activity
@stop

@section('content')
    <h1>Delete Activity</h1>
    <p>Are you sure you want to delete <em>{{$activity->name}}</em>?</p>
    <p><a href='/activities/delete/{{$activity->id}}'>Yes...</a></p>
@stop
