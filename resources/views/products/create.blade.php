@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    @include('layouts.be-header-without-export')
<div class="row">
    <div class="col-lg-10 px-3 py-3">
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row no-gutters">
                <div class="col-lg-6 pr-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Please select</option>
                            @foreach($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 pr-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Please fill the name ...">
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 pr-3">
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" name="price" class="form-control" id="price" aria-describedby="price" placeholder="Please fill the price ...">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group pr-3">
                        <label for="name">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group pr-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="8"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-dark">Submit</button>
                <button type="button" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection
