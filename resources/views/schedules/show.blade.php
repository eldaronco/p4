@extends('layouts.master')

@section('title')
    Edit Schedule
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

    <h1>Edit a Schedule</h1>

    @include('errors')

    <form method='POST' action='/schedules/edit' onsubmit='selectAllActivities()'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>
        <input type='hidden' name='id' value='{{ $schedule->id }}'>

        <div class='form-group'>
            <label for='group'>Existing schedule:</label>
            <select name='schedules' id='schedules' onChange='getActList(this)'>
                <option value=0 selected='selected'> New Schedule </option>
                @foreach($schedules_for_dropdown as $schedule_id => $schedule_name)
                {{ $selected = ($schedule_id == $schedule->id) ? 'selected' : '' }}
                    <option value='{{ $schedule_id }}' selected='{{ $selected }}'> {{ $schedule_name }} </option>

                @endforeach

            </select>


        </div>


        <div class='form-group'>
            <label for='group'>Activities in this schedule:</label>
        @if(sizeof($activities_for_this_schedule) == 0)
        You have not added any activities.
        @else
                <select multiple="multiple" id="activities" name="activities[]" size="10">
                @foreach($activities_for_this_schedule as $activity)

                    <option value='{{$activity->id}}'>{{ $activity->name }}</option>

                @endforeach

                </select>
        @endif

    </div>
    <button id="btnRight" class="btn">Add</button>
    <button id="btnLeft" class="btn">Remove</button>

   <div class='form-group'>
        <label for='group'>Available Activities:</label>
    @if(sizeof($activities_for_lists) == 0)
    You have not created any activities.
    @else
            <select multiple="multiple" id="allActivities" name="allActivities" size="10">
            @foreach($activities_for_lists as $activity)

                <option value='{{$activity->id}}'>{{ $activity->name }}</option>

            @endforeach

            </select>
    @endif

</div>

<div class="form-group">
    <label for='group'>Start Date:</label>
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" id='startDt' name='startDt' value='{{ $schedule->start_dt }}'/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class='form-group'>
    <label for='name'>Schedule Name:</label>
    <input
        type='text'
        id='name'
        name="name"
        value='{{ $schedule->name }}'
        >
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
