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

<script src="/js/p4.js"></script>

@stop

@section('content')

<h1>Create a Schedule</h1>

@include('errors')

<form class='form-horizontal' method='POST' action='/schedules/create' onsubmit='selectAllActivities()'>

    <input type='hidden' value='{{ csrf_token() }}' name='_token'>


    <div class='form-group'>
        <label class='col-sm-2 control-label' for='allActivities'>Available Activities:</label>
        @if(sizeof($activities_for_lists) == 0)
        You have not created any activities.
        @else
        <div class='col-sm-2'>
            <select multiple="multiple" id="allActivities" name="allActivities" size="10">
                @foreach($activities_for_lists as $activity)
                <option value='{{$activity->id}}'>{{ $activity->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <div class='col-sm-1'>
            <div class='row'>
                <button id="btnRight" class="btn btn-default" type='button'>Add <span class='glyphicon glyphicon-arrow-right'></span></button>
            </div>
            <div class='row'>
                <button id="btnLeft" class="btn btn-default" type='button'><span class='glyphicon glyphicon-arrow-left'></span> Remove</button>
            </div>
        </div>

        <label for='activities' class='col-sm-2 control-label'>Activities for new schedule:</label>
        <div class='col-sm-2'>
            <select multiple="multiple" id="activities" name="activities[]" size="10">

            </select>
        </div>

    </div>

    <div class="form-group">
        <label for='datetimepicker1' class='col-sm-2 control-label'>Start Date:</label>
        <div class='col-sm-5'>
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" id='startDt' name='startDt'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>


    <div class='form-group'>
        <label for='name' class='col-sm-2 control-label'>Save As:</label>
        <div class='col-sm-5'>
            <input
            type='text'
            id='name'
            name="name"
            value='{{ old('name','New Schedule') }}'
            >
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Create Schedule</button>
</form>

@stop


{{--
    This `body` section will be yielded right before the closing </body> tag.
    Use it to add specific things that *this* View needs at the end of the body,
    such as a page specific JavaScript files.
    --}}
    @section('body')


    @stop
