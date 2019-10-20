@extends('layouts.no-sidebar')

@section('content')

<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css">
    <form class="form-signin text-center" method="POST" action="{{ url('/login') }}" >
        {{-- <img src="{{ asset('img/logo.png') }}" /> --}}
        <img class="mb-4" src="http://geosportz.com/Files/Sport/Cricket.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail email" name="email" class="form-control" placeholder="Email address" required="" autofocus="" value="{{ old('email') }}" >
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword password" name="password" class="form-control" placeholder="Password" required="">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <div class="checkbox mb-3">
            <label>
          <input type="checkbox" name="remember" id="remember"> Remember me
            </label>

            <a href="{{ url('/password/reset') }}" class="pull-left">Forgot your password?</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <!-- <p class="mt-5 mb-3 text-muted">© 2017-2019</p> -->
         {!! csrf_field() !!}
    </form>

@endsection
