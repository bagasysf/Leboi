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
                            <form action="/checkout/{{$item->product_id}}" class="p-0" method="POST">
                            @csrf
                            @method("DELETE")
                            <!-- Button trigger modal -->
{{--                                <small>--}}
{{--                                    <a type="button" class="px-1 text-dark btn btn-link p-0"--}}
{{--                                            style="margin-top: -7px;" data-toggle="modal"--}}
{{--                                            data-target="#exampleModalCenter" href="checkout/{{$item->product_id}}">--}}
{{--                                        <i data-feather="edit"></i>--}}
{{--                                    </a>--}}
{{--                                </small>--}}
                                {{--                                <small><a class="px-1 text-dark" href="categories/{{$item->id}}/edit"><i--}}
                                {{--                                            data-feather="edit"></i></a></small>--}}
                                <small>
                                    <button class="px-1 text-dark btn btn-link p-0" style="margin-top: -7px;"
                                            type="submit"><i
                                            data-feather="x-square"></i></button>
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

    <!-- Modal -->
{{--    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"--}}
{{--         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Quantity</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                @if($transactionDetails)--}}
{{--                    <div class="modal-body">--}}
{{--                        <input type="number" value="{{$transactionDetails->quantity}}" min="0" max="100" step="1"/>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>--}}
{{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
