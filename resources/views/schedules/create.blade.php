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

    <form method='POST' action='/schedules/create' onsubmit='selectAllActivities()'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label for='group'>Copy existing schedule:</label>
            <select name='schedules' id='schedules' onChange='getActList(this)'>
                <option value=0 selected='true'> New Schedule </option>
                @foreach($schedules_for_dropdown as $schedule_id => $schedule_name)
                <option value='{{ $schedule_id }}'> {{ $schedule_name }} </option>

                @endforeach

            </select>
        </div>
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
        <button id="btnRight" class="btn">Add</button>
        <button id="btnLeft" class="btn">Remove</button>

        <div class='form-group'>
            <label for='group'>Activities for new schedule:</label>

                <select multiple="multiple" id="activities" name="activities[]" size="10">


                </select>

        </div>


        <div class="form-group">
            <label for='group'>Start Date:</label>
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" id='startDt' name='startDt'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>




        <div class='form-group'>
            <label for='name'>Save As:</label>
            <input
            type='text'
            id='name'
            name="name"
            value='{{ old('name','New Schedule') }}'
            >
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
