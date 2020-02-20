@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>@yield('header')</h2>
    </div>

    <div class="row no-gutters">
        <div class="col-10">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col 2">No</th>
                    <th scope="col 4">Name</th>
                    <th scope="col 2">Guard Name</th>
                </tr>
                </thead>
                <tbody>
                @forelse($userRoles as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->guard_name}}</td>
                        {{--                        <td>--}}
                        {{--                            <div class=" d-flex justify-content-center mt-1">--}}
                        {{--                                <small><a class="px-2 text-dark" href="orders/{{$item->id}}/view"><i data-feather="dollar-sign"></i></a></small>--}}
                        {{--                                --}}{{--                                <small><a class="px-2 text-dark" href="categories/{{$item->id}}/edit"><i--}}
                        {{--                                --}}{{--                                            data-feather="credit-card"></i></a></small>--}}
                        {{--                                <form action="/categories/{{$item->id}}" class="p-0" method="POST">--}}
                        {{--                                    @csrf--}}
                        {{--                                    @method("DELETE")--}}
                        {{--                                    <small>--}}
                        {{--                                        <button class="px-2 text-dark btn btn-link p-0 mtn15" type="submit"><i--}}
                        {{--                                                data-feather="trash-2"></i></button>--}}
                        {{--                                    </small>--}}
                        {{--                                </form>--}}
                        {{--                            </div>--}}
                        {{--                        </td>--}}
                    </tr>
                @empty
                    <tr>
                        <th>The Order is empty</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
