@extends('layouts.with-sidebar')

@section('pageName', 'js-users-page')

@section('content')
<div class="container">
    <div id="users-panel" class="panel panel-default" style="margin-top: 10px;">
                
        <div class="padding--bottom-lg">
            <table id="users-list" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Team</th>                        
                        <th>Points</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach ($matchs as $mch)
                    <tr>
                        <td data-th="Company">{{ $mch->Team->name }}</td>                        
                        <td data-th="Company">{{ $mch->points }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop