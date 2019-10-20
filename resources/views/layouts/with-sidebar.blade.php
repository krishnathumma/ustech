@extends('layouts.master')

@section('layout')

<div class="d-flex" id="wrapper">
@include('shared.topbar')
@include('shared.sidebar')
     <!-- Page Content -->

      <div id="page-content-wrapper" style="margin-top: 50px;">

        <div class="container-fluid">
         @yield('content')
        </div>
      </div>
    <!-- /#page-content-wrapper -->

        <!-- @include('flash')
        @yield('hero') -->

       <!--  <div class="container padding--remove">
            <div>
                <ul id="notifications" class="notifications"></ul>

                @yield('content')
            </div>
        </div>
       -->
@stop
    </div>