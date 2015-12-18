@extends('layouts.master')

@section('title')
    Create Activity
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop


@section('content')

    <h1>Create an activity</h1>

    @include('errors')

    <form method='POST' action='/activities/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>* Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ old('name','New Activity') }}'
            >
        </div>

        <div class='form-group'>
            <label>Description:</label>
            <input
                type='text'
                id='description'
                name='description'
                size='50'
                value='{{ old('description','Description') }}'
            >
        </div>

        <div class='form-group'>
            <label for='group'>* Group:</label>
            <select name='group' id='group'>
                @foreach($groups_for_dropdown as $group_id => $group_name)
                    <option value='{{ $group_id }}'> {{ $group_name }} </option>
                @endforeach
            </select>
        </div>



        <div class='form-group'>
            <label for='duration_minutes'>* Duration:</label>
            <input
                type='text'
                id='duration_minutes'
                name="duration_minutes"
                value='{{ old('duration_minutes','60') }}'
                >
        </div>

        <div class='form-group'>
            <label for='days'>* Days</label>
            <br />
            @foreach($days_for_checkbox as $day_id => $day)

                <input type='checkbox' name='days[]' value='{{$day_id}}'> {{ $day }}<br>

            @endforeach

        </div>

        <div class="form-group">
            <label for='default_time'>* Time (24HHii):</label>
            <input
                type='time'
                id='default_time'
                name="default_time"
                value='{{ old('default_time','1300') }}'
                >
        </div>


        <button type="submit" class="btn btn-primary">Create Activity</button>
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
