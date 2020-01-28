@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<div class="row">
    <div class="col-lg-8 px-3 py-3">
        <form action="/products/{{$products->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="form-group pr-3">
                        <div class="row no-gutters d-flex justify-content-center">
                            <img src="{{asset('images') . '/' . $products->image}}" alt="" class="rounded-circle img-fluid img-thumbnail" style="width: 13rem; height: 13rem;">
                        </div>
                        <div class="text-center pt-4">
                            <label class="btn btn-outline-dark mb-n1">
                                Choose File <input type="file" name="image" hidden>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row no-gutters">
                <div class="col-lg-12 pr-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Please select</option>
                            @foreach($categories as $item)
                            <option value="{{$item->id}}" {{$products->category_id == $item->id ? 'selected' : null }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 pr-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Please fill the name ..." value="{{$products->name}}">
                    </div>
                </div>
                <div class="col-lg-12 pr-3">
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" name="price" class="form-control" id="price" aria-describedby="price" placeholder="Please fill the price ..." value="{{$products->price}}">
                    </div>
                </div>
            </div>

            <div class="form-group pr-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="8">{{$products->description}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-dark">Submit</button>
                <button type="button" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection