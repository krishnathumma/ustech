@extends('layouts.with-sidebar')

@section('pageName', 'js-create-user-page')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('hero')
    @include('shared.hero', [
        'sub_template' => 'users.hero-sub'
    ])
@stop

@section('content')
<div class="container" style="border: 1px solid #f4f4f4; margin-top: 10px;">
    <div id="user-panel" class="panel panel-default">

        <h4>Create New Player <small>Personal Details</small></h4>

        @if (count($errors) > 0)
            <div class="alert alert--danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="create-user" class="panel">
            <form action="{{ url('/players') }}" method="POST">
                <input type="hidden" id="user-avatar" name="avatar" value="">
                    <div style="border: 1px solid #f3f3f3; padding: 5px;">
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-name">Team Name</label>
                            <select name="team_num" id="team_num" class="form-control form-control--secondary">
                                <option value="">Please select</option>
                                 @include('teams.teamdropdown')
                             </select>
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-name">Jersey number</label>
                            <input type="text" name="jrcy_num" id="jrcy-num" class="form-control form-control--secondary" placeholder="jersey number" autofocus required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-name">First Name</label>
                            <input type="text" name="first_name" id="user-name" class="form-control form-control--secondary" placeholder="Enter first name" autofocus required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-name">Last Name</label>
                            <input type="text" name="last_name" id="user-name" class="form-control form-control--secondary" placeholder="Enter last name" autofocus required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-name">Country</label>
                            <input type="text" name="c_name" id="user-name" class="form-control form-control--secondary" placeholder="Enter country" autofocus required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-email">Total Matches</label>
                            <input type="text" name="matches" id="user-match" class="form-control form-control--secondary" placeholder="Number of matches" required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-email">Total Run</label>
                            <input type="text" name="run" id="user-run" class="form-control form-control--secondary" placeholder="total of runs" required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-email">Highest</label>
                            <input type="text" name="highest_scores" id="user-high" class="form-control form-control--secondary" placeholder="total of highest" required />
                        </div>
                        <div class="form-group form-group--lg">
                            <label class="user__label" for="user-email">Total Hundreds</label>
                            <input type="text" name="hundreds" id="user-match" class="form-control form-control--secondary" placeholder="total of Hundreds" required />
                    </div>                        
                </div>                              

                <div class="panel__divider flex flex--space-between flex--bottom flex--wrap">
                        <div id="content-actions-grp" class="button-group">
                            <button id="save-changes-btn" class="btn btn-primary" type="submit" name="save" value="save"><i class="icon icon--save"></i> Save</button>
                            <button id="cancel-changes-btn" class="btn btn-danger" type="submit" name="cancel" value="cancel" formnovalidate><i class="icon icon--cancel"></i> Cancel</button>
                        </div>
                    </div>

                {!! csrf_field() !!}
            </form>
        </div><!-- end #create-user -->
    </div>
</div>
@stop