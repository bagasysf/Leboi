@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="row bo-gutters">
            @include('layouts.fe-sidebar')
        </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-interval="false" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($products as $item)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{$loop->index + 1}}"
                    class="@if($loop->first) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($products as $item)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{asset('images/'.$item->image)}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="">{{$item->name}}</h1>
                        <h2 class="text-warning pb-2">IDR {{$item->price}}</h2>
                        <form action="/add-to-cart/{{$item->id}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-warning mb-5 font-weight-bold">Add to Cart</button>
                        </form>
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
@endsection
