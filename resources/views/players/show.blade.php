@extends('layouts.with-sidebar')

@section('pageName', 'js-user-page')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop



@section('content')
<div class="container">
    <div id="user-panel" class="panel panel-default" style="margin-top: 10px; border: 1px solid #f4f4f4; padding: 10px; width: 40%;">

        <input type="hidden" name="user-id" id="user-id" value="{{ $player->id }}">

        <h3>Personal Details</h3>
        @if (count($errors) > 0)
            <div class="alert alert--danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="tab1" class="panel">
            <div>
                <div style="padding: 10px; border: 1px solid #f4f4f4">
                    <h5 class="user__label">Name</h5>
                    <div id="first_name-editor" class="user__input">{{ $player->first_name }}</div>
                    <h5 class="user__label">jurcy number</h5>
                    <div id="jsy_number-editor" class="user__input">{{ $player->jsy_number }}</div>
                    <h5 class="user__label">Country</h5>
                    <div id="country-editor" class="user__input">{{ $player->country }}</div>
                    <h5 class="user__label">Total run</h5>
                    <div id="run-editor" class="user__input">{{ $player->run }}</div>
                </div>
            </div>
            
                <div class="user__personal-details panel__divider flex flex--space-between flex--bottom">
                    <div id="user-actions-grp" class="user__button-grp button-group">
                        <a id="edit-profile-btn" class="btn btn-warning"><i class="icon icon--edit"></i> Edit</a>
                            {{ method_field('DELETE') }}
                            <a href="{{ url('/players', $player->id) }}" id="delete-profile-btn" class="btn btn-danger" type="submit"><i class="icon icon--delete">Delete</a>
                            {!! csrf_field() !!}
                    </div>
                    <div id="content-actions-grp" class="user__button-grp button-group hidden">
                        <a id="save-changes-btn" class="btn btn-primary"><i class="icon icon--save"></i> Save</a>
                        <a id="cancel-changes-btn" class="btn btn-danger"><i class="icon icon--cancel"></i> Cancel</a>
                    </div>
                </div>
            
        </div><!-- end #tab1 -->

       
    </div>
</div>
@stop