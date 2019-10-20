@extends('layouts.with-sidebar')

@section('pageName', 'js-users-page')

@section('content')

<div class="container">
    <div class="panel panel-default" style="padding: 20px;">
        @include('svg.user'){{ count($players) }} Players
        @can('store', Auth::user())
            <a href="{{ url('/players/create') }}" class="btn btn-primary" style="float: right"><i class="fa fa-plus"></i> Add Player</a>
        @endcan
    </div>

        <div class="padding-bottom-lg">
            <table id="users-list" class="table table--bordered table--hover table--responsive">
                <thead>
                    <tr>
                        
                        <th>&nbsp;</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Teams</th>
                        <th>Matches</th>
                        <th>Runs</th>
                        <th>Highest Scores</th>
                        <th>Hundreds</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($players as $player)
                    <tr>
                        
                        <td class="users__avatar-container">
                            @if ($player->image_uri)
                            <a href="/player/{{ $player->id }}">
                                <img src="{{ $player->image_uri }}" alt="{{ $player->jsy_number }}" class="users__avatar" width="28" height="28">
                            </a>
                            @endif
                        </td>
                        <td data-th="Name"><a href="/players/{{ $player->id }}">{{ $player->first_name }}</a></td>
                        <td data-th="Company">{{ $player->country }}</td>
                        <td data-th="Company">{{ $player->team->name }}</td>
                        <td data-th="Email">{{$player->matches}}</td>
                        <td data-th="Email">{{$player->run}}</td>
                        <td data-th="Email">{{$player->highest_scores}}</td>
                        <td data-th="Email">{{$player->hundreds}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop