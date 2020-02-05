@extends('layouts.home')

@section('content')
<div class="container-fluid">
    <div class="row bo-gutters">
        <nav class="col-md-2 d-none d-md-block bg-transparent sidebar">
            <div class="d-flex justifycontent-center align-items-center nav-categories">
                <ul class="nav flex-column bg-warning rounded-right py-3">
                    <button onclick="openNav()" class="btn bg-transparent text-dark font-weight-bold ml-auto shadow-none">
                        <div class="p" style="writing-mode: vertical-rl; text-orientation: mixed;">Categories</div>
                    </button>
                </ul>
            </div>
            <div class="sidebar-sticky d-flex justifycontent-center align-items-center mysidebar" id="mySidebar">
                <ul class="nav flex-column bg-warning rounded-right py-3" style="width: 10rem">
                    <a href="javascript:void(0)" onclick="closeNav()" id="main" class="nav-link text-dark ml-auto">
                        <i data-feather="minimize-2" style="color: black"></i>
                    </a>
                    @foreach($categories as $item)
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('dashboard')?'active': ''}}" href="/dashboard">
                            {{$item->name}}<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>

    </div>
</div>
<div id="carouselExampleCaptions" class="carousel slide">
    <ol class="carousel-indicatorsphp ">
        @foreach($products as $item)
        <li data-target="#carouselExampleCaptions" data-slide-to="{{$loop->index + 1}}" class="@if($loop->first) active @endif"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($products as $item)
        <div class="carousel-item @if($loop->first) active @endif">
            <img src="{{asset('images/'.$item->image)}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="">{{$item->name}}</h1>
                <h2 class="text-warning pb-2">IDR {{$item->price}}</h2>
                <a href="" class="btn btn-warning mb-5 font-weight-bold">Add to Cart</a>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev ml-5" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next mr-5" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- <main role="main" class="col-md-12 ml-sm-auto col-lg-12">
                    <div class="jumbotron jumbotron-fluid bg-dark">
                        <div class="container px-5 d-flex justify-content-center">
                        </div>
                    </div>
                </main> -->
@endsection
