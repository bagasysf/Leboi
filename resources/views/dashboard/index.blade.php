@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    @include('layouts.be-header-without-export')

    <div class="row">
        <div class="col">
            <div class="card border-0 shadow" style="width: 21rem;">
{{--                <img src="..." class="card-img-top" alt="...">--}}
                <div class="card-body">
                    <h3 class="card-title font-weight-bold text-center">Total Transaction</h3>
                    <h1 class="font-weight-bold text-center">{{$totalTransaction}}</h1>
                    <p class="card-text text-center">times</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow" style="width: 21rem;">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold text-center">Total Product</h3>
                    <h1 class="font-weight-bold text-center">{{$totalProduct}}</h1>
                    <p class="card-text text-center">products</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 shadow" style="width: 21rem;">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold text-center">Total User</h3>
                    <h1 class="font-weight-bold text-center">{{$totalUser}}</h1>
                    <p class="card-text text-center">registered</p>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="row no-gutters mt-4">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card border-0 shadow px-3">--}}
{{--                <canvas class="my-4" id="myChart"></canvas>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
