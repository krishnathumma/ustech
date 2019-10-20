@extends('layouts.with-sidebar')

@section('pageName', 'js-users-page')

@section('content')
<div class="container">
    <div id="users-panel" class="panel panel-default">
        
        <div style="margin-top: 10px; padding: 10px;">
            @include('svg.user'){{ count($matchs) }} Matches
            @can('store', Auth::user())
                <a href="{{ url('/match/create') }}" class="btn btn-primary" style="float: right; margin-bottom: 10px;"> <i class="fa fa-plus"></i> Add Match</a>
            @endcan
        </div>

        <div class="padding--bottom-lg">
            <table id="users-list" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Team A</th>                        
                        <th>Team B</th>  
                        <th>Winner Team</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach ($matchs as $mch)
                    <tr>
                        <td data-th="Company">{{ $mch->firstTeam->name }}</td>                        
                        <td data-th="Company">{{ $mch->secondTeam->name }}</td>
                        <td data-th="Company">{{ $mch->winnerTeam->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop