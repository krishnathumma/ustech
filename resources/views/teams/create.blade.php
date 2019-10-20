@extends('layouts.with-sidebar')

@section('pageName', 'js-create-course-page')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop



@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel panel-default" style="margin-top: 10px; width: 40%; border: 1px solid #f4f4f4; padding: 10px;">
    <h4>Create Team</h4>
    <form method="POST" action="{{ url('/teams') }}" enctype="multipart/form-data">
        <input type="hidden" id="course-img" name="image" value="">

        <div class="form-group">
            <label for="course-title">Team Name</label>
            <input type="text" name="team" class="form-control" value="{{  old('team') }}" placeholder="Enter Team title" autofocus required />
        </div>
        <div class="form-group">
            <label for="course-title">Team Logo</label>
            <input type="file" name="teamlogo" class="form-control">
        </div>
        <div class="form-group">
            <label for="course-title">State</label>
            <input type="text" name="state" class="form-control" value="{{ old('state') }}" placeholder="Enter state" autofocus required />
        </div>
        <button id="save-changes-btn" class="btn btn-primary" type="submit" name="save" value="save"><i class="icon icon--save"></i> Save</button>
        <button id="cancel-changes-btn" class="btn btn-danger" type="submit" name="cancel" value="cancel" formnovalidate><i class="icon icon--cancel"></i> Cancel</button>
        {!! csrf_field() !!}
    </form>
</div>
@stop