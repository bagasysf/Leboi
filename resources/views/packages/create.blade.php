@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
@include('layouts.be-header-without-export')

<div class="row">
    <div class="col-lg-7 px-3 py-3">
        <form action="/packages" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Please fill the name ...">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-dark">Submit</button>
            <button type="button" class="btn btn-outline-secondary">Reset</button>
        </form>
    </div>
</div>
@endsection
