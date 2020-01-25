@extends('layouts.login')

@section ('content')
<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <img class="mb-4" src="{{asset('images/leboi-logo.png')}}" alt="" width="100" height="auto">
    <!-- <h1 class="h4 mb-3 font-weight-large">Please sign in</h1> -->
    <label for="email" class="sr-only">Email address</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
    <div class="checkbox mb-3">
        <label class="form-check-label" for="remember">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-dark btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
@endsection