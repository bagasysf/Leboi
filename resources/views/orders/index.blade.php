@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    <div class="row no-gutters">
        <div class="col-12">
            <table class="table ">
                <div class="row no-gutters">
{{--                    <div class="col-2 text-start">--}}
{{--                        <div class="-flex align-items-center py-2 pr-2">--}}
{{--                            <a href="packages/create" class="text-decoration-none text-dark">--}}
{{--                                <h5>Add New <i data-feather="plus-circle"></i></h5>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <form method="GET">
                        <div class="offset-6 col-6 pr-2">
                            <div class="input-group mb-3">
                                <input type="text" name="cari" class="form-control"
                                       value="{{ old('cari') }}" placeholder="Search id transaction here..">
                                <button type="submit" class="btn btn-outline-secondary"><i
                                        data-feather="search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <thead>
                <tr>
                    <th scope="col 2">No</th>
                    <th scope="col 4">Barberman</th>
                    <th scope="col 4">Status</th>
                    <th scope="col 2">Total</th>
                    <th scope="col 2">Custom</th>
                </tr>
                </thead>
                <tbody>
                @forelse($checkout as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->status}}</td>
                        <td>Rp {{$item->total}}</td>
                        <td>
                            <div class=" d-flex justify-content-start mt-1">
                                <small><a class="px-2 text-dark" href="orders/{{$item->id}}/view"><i
                                            data-feather="dollar-sign"></i></a></small>
                                {{--                                <small><a class="px-2 text-dark" href="categories/{{$item->id}}/edit"><i--}}
                                {{--                                            data-feather="credit-card"></i></a></small>--}}
                                <form action="/categories/{{$item->id}}" class="p-0" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <small>
                                        <button class="px-2 text-dark btn btn-link p-0 mtn15" type="submit"><i
                                                data-feather="trash-2"></i></button>
                                    </small>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>The Order is empty</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
