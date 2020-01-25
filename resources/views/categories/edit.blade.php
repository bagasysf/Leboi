@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<div class="row">
    <div class="col-lg-7 px-3 py-3">
        <form action="/categories/{{$categories->id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label>Package</label>
                <select class="form-control" name="package_id">
                    <option value="">Please select</option>
                    @foreach($packages as $item)
                    <option value="{{$item->id}}" {{$categories->package_id == $item->id ? 'selected':null}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Please fill the name ..." value="{{$categories->name}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$categories->description}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-dark">Submit</button>
                <button type="button" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection