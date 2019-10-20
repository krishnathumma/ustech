@extends('layouts.with-sidebar')

@section('content')
<div class="container" style="margin-top: 10px;">
    <div style="padding: 10px;">
        @include('svg.courses_black'){{ count($teams) }} Teams
        @can('store', App\Course::class)
            <a href="{{ url('/teams/create') }}" class="btn btn-primary" style="float: right;">Create Team</a>
        @endcan
    </div>

    <div class="row" style="border: 1px solid #f4f4f4; padding: 10px;">
        @foreach ($teams as $team)
            @include('shared.team-grid-item')
        @endforeach
   </div>
</div> 
@stop