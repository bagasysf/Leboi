@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<div class="row no-gutters bg-transparent">
    <ul class="list-group">
        <li class="list-group-item no-gutters py-3">
            <div class="col">
                <div class="card border-0 shadow" style="width: 19rem; height: 10rem">
                    <div class="row no-gutters" style="height: 10rem;">
                        <div class="col-md-4 pl-5 d-flex justify-content-center">
                            <img class="img-fluid text-primary" style="width: 50px; height: auto;" src="{{asset('images/package.svg')}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <div class="card-body d-flex align-items-center text-center">
                                <a href="packages/create" class="text-decoration-none text-dark">
                                    <h3>Add New <i data-feather="plus-circle"></i></h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    @foreach($packages as $item)
    <ul class="list-group">
        <li class="list-group-item no-gutters border-0 py-3">
            <div class="col">
                <div class="card shadow" style="width: 19rem; height: 10rem;">
                    <div class="card-body">
                        <h3 class="text-center pt-4">{{$item->name}}</h3>
                        <div class=" d-flex justify-content-center">
                            <small><a class="px-2 text-dark" href=""><i data-feather="eye"></i></a></small>
                            <small><a class="px-2 text-dark" href="packages/{{$item->id}}/edit"><i data-feather="edit-2"></i></a></small>
                            <form action="/packages/{{$item->id}}" class="p-0" method="POST">
                                @csrf
                                @method("DELETE")
                                <small>
                                    <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit"><i data-feather="trash-2"></i></button>
                                </small>
                            </form>
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
        {{$packages->links()}}
    </div>
</div>
@endsection
