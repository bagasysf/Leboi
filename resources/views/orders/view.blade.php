@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    @include('layouts.be-header-without-export')

    <div class="row no-gutters">
        <div class="col-12">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col 2">No</th>
                    <th scope="col 4">Product</th>
                    <th scope="col 2">Quantity</th>
                    <th scope="col 2">Price</th>
                    <th scope="col 2">Total Price</th>
                </tr>
                </thead>
                <tbody>
                @forelse($details as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>Rp {{$item->sub_total}}</td>
                        <td>Rp {{$item->quantity*$item->sub_total}}</td>
                    </tr>

                @empty
                    <tr>
                        <th>The Order is empty</th>
                    </tr>
                @endforelse
                @if($checkout)
                    <tr>
                        <td colspan="4" class="font-weight-bold">Total</td>
                        <td class="font-weight-bold">Rp {{ $checkout->total }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
                @if($checkout)
                    <form action="/orders/{{ $checkout->id }}" method="POST">
                        @csrf
                        <div class="row no-gutters d-flex justify-content-end">
                            <div class="col-5 text-right px-3">
                                <button type="submit" class="btn btn-primary px-4">Pay</button>
                                <hr class="mt-n3">
                            </div>
                        </div>
                    </form>
                @endif
        </div>
    </div>
@endsection
