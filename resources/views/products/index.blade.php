@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<div class="row no-gutters">
    @role('admin')
    <ul class="list-group">
        <li class="list-group-item no-gutters py-3 bg-transparent">
            <div class="col-3">
                <div class="card border-0 shadow" style="width: 19rem; height: 10rem">
                    <div class="row no-gutters" style="height: 10rem;">
                        <div class="col-md-4 pl-5 d-flex justify-content-center">
                            <img class="img-fluid text-primary" style="width: 50px; height: auto;" src="{{asset('images/shopping-cart.svg')}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <div class="card-body d-flex align-items-center text-center">
                                <a href="products/create" class="text-decoration-none text-dark">
                                    <h3>Add New <i data-feather="plus-circle"></i></h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    @endrole
    @foreach($products as $item)
    <ul class="list-group">
        <li class="list-group-item no-gutters border-0 py-3 bg-transparent">
            <div class="col">
                <div class="card border-0 shadow" style="width: 19rem; height: 10rem;">
                    <div class="bg-white" style="object-fit: cover; overflow: hidden;">
                        <div class="d-flex justify-content-center">
                            <img class="card-img mt-n5" src="{{asset('images/'.$item->image)}}" alt="Card image" style="height: auto; width: 19rem; opacity: 15%">
                        </div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <div>
                                <h4 class="text-center">{{$item->name}}</h4>
                                <p class="text-center">{{$item->category->package->name}} | {{$item->category->name}}</p>
                                <div class="d-flex justify-content-center">
                                    <small><a class="px-2 text-dark" href=""><i data-feather="eye"></i></a></small>
                                    @role('admin')
                                    <small><a class="px-2 text-dark" href="products/{{$item->id}}/edit"><i data-feather="edit-2"></i></a></small>
                                    <form action="products/{{$item->id}}" class="p-0" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <small>
                                            <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit"><i data-feather="trash-2"></i></button>
                                        </small>
                                    </form>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    @endforeach
</div>
<div class="row no-gutters d-flex justify-content-center">
    <div class="col-2 d-flex justify-content-center pt-3">
        {{$products->links()}}
    </div>
</div>
@endsection
