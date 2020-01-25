@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<div class="row">
    <div class="col-lg-7 px-3 py-3">
        <form action="/packages/{{$packages->id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Package Name</label>
                <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Please fill the name ..." value="{{$packages->name}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$packages->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-dark">Update</button>
            <button type="button" class="btn btn-outline-secondary">Reset</button>
        </form>
    </div>
</div>
@endsection