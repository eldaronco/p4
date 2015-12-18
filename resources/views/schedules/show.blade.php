@extends('layouts.master')

@section('title')
    Edit Schedule
@stop

{{--
This is actually the edit schedule view.  It shows the schedule and all of it's activities.  You can edit everything
including the name.
--}}

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

<script src="/js/p4.js"></script>

@stop


@section('content')

<h1>Edit a Schedule</h1>

@include('errors')

<form class='form-horizontal' method='POST' action='/schedules/edit' onsubmit='selectAllActivities()'>

    <input type='hidden' value='{{ csrf_token() }}' name='_token'>
    <input type='hidden' name='id' value='{{ $schedule->id }}'>

    <div class='form-group'>
        <label class='col-sm-2 control-label' for='schedules'>Existing schedule:</label>
        <div class='col-sm-5'>
            <select name='schedules' class='form-control' id='schedules' onChange='getActList(this)'>
                @foreach($schedules_for_dropdown as $schedule_id => $schedule_name)
                {{ $selected = ($schedule_id == $schedule->id) ? 'selected' : '' }}
                <option value='{{ $schedule_id }}' {{ $selected }}> {{ $schedule_name }} </option>

                @endforeach
            </select>
        </div>

    </div>

    <div class='form-group'>
        <label for='allActivities' class='col-sm-2 control-label'>Available Activities:</label>
        @if(sizeof($activities_for_lists) == 0)
        <div class='col-sm-2'>
            You have not created any activities.
        </div>
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

        <label for='activities' class='col-sm-2 control-label'>Activities in this schedule:</label>
        <div class='col-sm-2'>
            <select multiple="multiple" id="activities" name="activities[]" size="10">
                @foreach($activities_for_this_schedule as $activity)

                <option value='{{$activity->id}}'>{{ $activity->name }}</option>

                @endforeach

            </select>
        </div>
    </div>

    <div class="form-group">
        <label for='datetimepicker1' class='col-sm-2 control-label'>Start Date:</label>
        <div class='col-sm-5'>
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" id='startDt' name='startDt' value='{{ $schedule->start_dt }}'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <div class='form-group'>
        <label for='name' class='col-sm-2 control-label'>Schedule Name:</label>
        <div class='col-sm-5'>
            <input
            type='text'
            id='name'
            name="name"
            value='{{ $schedule->name }}'
            >
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update Schedule</button>
</form>

@stop


{{--
    This `body` section will be yielded right before the closing </body> tag.
    Use it to add specific things that *this* View needs at the end of the body,
    such as a page specific JavaScript files.
    --}}
    @section('body')

    @stop
