@extends('layouts.master')

@section('title')
    Edit Activity
@stop

{{--
    This is the view to edit an activity.  It populates the activity fields with the data from the input activity_id.
--}}
{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop


@section('content')

    <h1>Edit an activity</h1>

    @include('errors')

    <form method='POST' action='/activities/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>
        <input type='hidden' name='id' value='{{ $activity->id }}'>

        <div class='form-group'>
            <label>* Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{$activity->name }}'
            >
        </div>

        <div class='form-group'>
            <label>Description:</label>
            <input
                type='text'
                id='description'
                name='description'
                size='50'
                value='{{$activity->description }}'
            >
        </div>

        <div class='form-group'>
            <label for='group'>* Group:</label>
            <select name='group' id='group'>
                @foreach($groups_for_dropdown as $group_id => $group_name)
                    {{ $selected = ($group_id == $activity->group->id) ? 'selected' : '' }}
                    <option value='{{ $group_id }}' {{ $selected }}> {{ $group_name }} </option>
                @endforeach
            </select>
        </div>


        <div class='form-group'>
            <label for='Duration'>* Duration (min):</label>
            <input
                type='text'
                id='duration_minutes'
                name="duration_minutes"
                value='{{ $activity->duration_minutes }}'
                >
        </div>


        <div class='form-group'>
            <label for='days'>* Days</label>
            <br />
            @foreach($days_for_checkbox as $day_id => $day)
            <?php $checked = (in_array($day_id,$days_for_this_activity)) ? 'CHECKED' : '' ?>
                <input {{ $checked }} type='checkbox' name='days[]' value='{{$day_id}}'> {{ $day }}<br>
            @endforeach
        </div>

        <div class="form-group">
            <label for='default_time'>* Time (24Hi):</label>
            <input
                type='time'
                id='default_time'
                name="default_time"
                value='{{ $activity->default_time }}'
                >
        </div>


        <button type="submit" class="btn btn-primary">Update Activity</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
