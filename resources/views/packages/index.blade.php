@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
<div class="row no-gutters">
    <div class="col py-3">
        <div class="card border-0 shadow bg-white" style="width: 20rem; height: 10rem">
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
        <!-- <div class=" card border-0 shadow-sm bg-info" style="width: 20rem; height: 10rem;">
                            <div class="card-body text-center">
                                <h5 class="card-title text-light">Add New Package</h5>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                    </div> -->
    </div>
    <div class="col py-3">
        <div class="card border-0 shadow-sm bg-info" style="width: 20rem; height: 10rem;">
            <div class="card-body">
                <h5 class="card-title">Add New Package</h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col py-3">
        <div class="card border-0 shadow-sm bg-info" style="width: 20rem; height: 10rem;">
            <div class="card-body">
                <h5 class="card-title">Add New Package</h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col py-3">
        <div class="card border-0 shadow-sm bg-info" style="width: 20rem; height: 10rem;">
            <div class="card-body">
                <h5 class="card-title">Add New Package</h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection