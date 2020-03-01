@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    @include('layouts.be-header-with-export')

    <div class="row d-flex justify-content-center no-gutters">
        <div class="col-2 text-start">
            <div class="-flex align-items-center py-2 pr-2">
                <a href="products/create" class="text-decoration-none text-dark">
                    <h5>Add New <i data-feather="plus-circle"></i></h5>
                </a>
            </div>
        </div>
        <div class="offset-2 col-8 pr-2">
            <form method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="cari" class="form-control"
                           value="{{ old('cari') }}" placeholder="Search here..">
                    <button type="submit" class="btn btn-outline-secondary"><i
                            data-feather="search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($products as $item)
            <div class="col mb-4    ">
                <div class="card border-0 shadow" style="width: 21rem; height: 10rem;">
                    <div class="bg-white" style="object-fit: cover; overflow: hidden;">
                        <div class="d-flex justify-content-center">
                            <img class="card-img mt-n5" src="{{asset('images/'.$item->image)}}" alt="Card image"
                                 style="height: auto; width: 21rem; opacity: 15%">
                        </div>
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <div>
                                <h4 class="text-center">{{$item->name}}</h4>
                                <p class="text-center">{{$item->category->package->name}}
                                    | {{$item->category->name}}</p>
                                <div class="d-flex justify-content-center">
                                    @role('admin')
                                    <small><a class="px-2 text-dark" href="products/{{$item->id}}/edit"><i
                                                data-feather="edit-2"></i></a></small>
                                    <form action="products/{{$item->id}}" class="p-0" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <small>
                                            <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit">
                                                <i data-feather="trash-2"></i></button>
                                        </small>
                                    </form>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <hr>
                <p class="mt-n2 font-weight-normal">The Product is empty</p>
            </div>
        @endforelse
    </div>

    {{--    <div class="row no-gutters d-flex justify-content-center">--}}
    {{--        @forelse($products as $item)--}}
    {{--            <ul class="list-group">--}}
    {{--                <li class="list-group-item no-gutters border-0 py-3 bg-transparent">--}}
    {{--                    <div class="col">--}}
    {{--                        <div class="card border-0 shadow" style="width: 19rem; height: 10rem;">--}}
    {{--                            <div class="bg-white" style="object-fit: cover; overflow: hidden;">--}}
    {{--                                <div class="d-flex justify-content-center">--}}
    {{--                                    <img class="card-img mt-n5" src="{{asset('images/'.$item->image)}}" alt="Card image"--}}
    {{--                                         style="height: auto; width: 19rem; opacity: 15%">--}}
    {{--                                </div>--}}
    {{--                                <div class="card-img-overlay d-flex align-items-center justify-content-center">--}}
    {{--                                    <div>--}}
    {{--                                        <h4 class="text-center">{{$item->name}}</h4>--}}
    {{--                                        <p class="text-center">{{$item->category->package->name}}--}}
    {{--                                            | {{$item->category->name}}</p>--}}
    {{--                                        <div class="d-flex justify-content-center">--}}
    {{--                                            <small><a class="px-2 text-dark" href=""><i--}}
    {{--                                                        data-feather="eye"></i></a></small>--}}
    {{--                                            @role('admin')--}}
    {{--                                            <small><a class="px-2 text-dark" href="products/{{$item->id}}/edit"><i--}}
    {{--                                                        data-feather="edit-2"></i></a></small>--}}
    {{--                                            <form action="products/{{$item->id}}" class="p-0" method="POST">--}}
    {{--                                                @csrf--}}
    {{--                                                @method("DELETE")--}}
    {{--                                                <small>--}}
    {{--                                                    <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit">--}}
    {{--                                                        <i data-feather="trash-2"></i></button>--}}
    {{--                                                </small>--}}
    {{--                                            </form>--}}
    {{--                                            @endrole--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        @empty--}}
    {{--            <div class="row no-gutters">--}}
    {{--                <div class="col-12">--}}
    {{--                    <hr>--}}
    {{--                    <p class="mt-n2 font-weight-normal">The Product is empty</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endforelse--}}
    {{--    </div>--}}
    <div class="row no-gutters d-flex justify-content-center">
        <div class="col-2 d-flex justify-content-center pt-3">
            {{$products->links()}}
        </div>
    </div>
@endsection
