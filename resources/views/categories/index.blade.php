@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<h1>Hello World</h1>
<!-- <div class="row no-gutters">
    <ul class="list-group">
        <li class="list-group-item no-gutters py-3">
            <div class="col">
                <div class="card border-0 shadow bg-white" style="width: 20rem; height: 10rem">
                    <div class="row no-gutters" style="height: 10rem;">
                        <div class="col-md-4 pl-5 d-flex justify-content-center">
                            <img class="img-fluid text-primary" style="width: 50px; height: auto;" src="{{asset('images/package.svg')}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <div class="card-body d-flex align-items-center text-center">
                                <a href="categories/create" class="text-decoration-none text-dark">
                                    <h3>Add New <i data-feather="plus-circle"></i></h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div> -->
@endsection