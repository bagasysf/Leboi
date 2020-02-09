@extends('layouts.home')

@section('content')
    <div class="container py-3">
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($details as $item)
                <tr>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>Rp {{$item->product->price}}</td>
                    <td>Rp {{$item->sub_total}}</td>
                    <td>
                        <div class=" d-flex justify-content-center">
                            <small><a class="px-2 text-dark" href="checkout/{{$item->id}}/edit"><i
                                        data-feather="edit-2"></i></a></small>
                            <form action="/checkout/{{$item->product_id}}" class="p-0" method="POST">
                                @csrf
                                @method("DELETE")
                                <small>
                                    <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit"><i
                                            data-feather="trash-2"></i></button>
                                </small>
                            </form>
                        </div>
                    </td>
                    @empty
                        <td>Your cart is empty</td>
                    @endforelse
                </tr>

                @if($transactions)
                    <tr>
                        <td colspan="4" class="font-weight-bold">Total</td>
                        <td class="font-weight-bold">Rp {{ $transactions->total }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if($transactions)
            <form action="/checkout/{{ $transactions->id }}" method="POST">
                @csrf
                <div class="row no-gutters">
                    <div class="col text-right px-3">
                    <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
