@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<!-- <div class="row no-gutters">
    <div class="col-lg-11 py-3 px-3">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-3">
                        <a href="products/create" class="pl-2 text-decoration-none text-dark border-0 h6 font-weight-bold">Add New <i data-feather="plus-circle"></i> </a>
                    </div>
                </div>
                <hr>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Package</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Properties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$item->category->package->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->image}}</td>
                            <td>
                                <div class="d-flex justify-content-start ml-n2">
                                    <small><a class="px-2 text-dark" href=""><i data-feather="eye"></i></a></small>
                                    <small><a class="px-2 text-dark" href="products/{{$item->id}}/edit"><i data-feather="edit-2"></i></a></small>
                                    <form action="/products/{{$item->id}}" class="p-0" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <small>
                                            <button class="px-2 text-dark btn btn-link p-0 mt-n3" type="submit"><i data-feather="trash-2"></i></button>
                                        </small>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
<div class="row no-gutters">
    <ul class="list-group">
        <li class="list-group-item no-gutters py-3">
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
    @foreach($products as $item)
    <ul class="list-group">
        <li class="list-group-item no-gutters border-0 py-3">
            <div class="col">
                <div class="card border-0 shadow" style="width: 19rem; height: 10rem;">
                    <div class="bg-white" style="object-fit: cover; overflow: hidden;">
                        <div class="d-flex justify-content-center">
                            <img class="card-img mt-n5" src="{{asset('images/'.$item->image)}}" alt="Card image" style="height: auto; width: 19rem; opacity: 5%">
                        </div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <div>
                                <h4 class="text-center">{{$item->name}}</h4>
                                <p class="text-center">{{$item->category->package->name}} | {{$item->category->name}}</p>
                                <div class="d-flex justify-content-center">
                                    <small><a class="px-2 text-dark" href=""><i data-feather="eye"></i></a></small>
                                    <small><a class="px-2 text-dark" href="products/{{$item->id}}/edit"><i data-feather="edit-2"></i></a></small>
                                    <form action="products/{{$item->id}}" class="p-0" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <small class="mt-n3">
                                            <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit"><i data-feather="trash-2"></i></button>
                                        </small>
                                    </form>
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
