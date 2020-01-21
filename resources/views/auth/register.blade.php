@extends('layouts.register')

@section('content')
<form class="form-signin" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('images/bootstrap-solid.svg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Register an account</h1>
    </div>

    <div class="form-label-group">
        <input type="name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder=" Your name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <label for="name">Name</label>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
        <label for="email">Email address</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        <label for="password">Password</label>
        @error('password')
            span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
        <label for="password-confirm">Password</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
</form>
@endsection