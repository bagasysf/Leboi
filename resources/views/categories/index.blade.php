@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    @include('layouts.be-header-with-export')

    <div class="row no-gutters">
        <div class="col-12">
            <table class="table ">
                <div class="row no-gutters">
                    <div class="col-2 text-start">
                        <div class="-flex align-items-center py-2 pr-2">
                            <a href="categories/create" class="text-decoration-none text-dark">
                                <h5>Add New <i data-feather="plus-circle"></i></h5>
                            </a>
                        </div>
                    </div>
                    <form method="GET">
                        <div class="offset-4 col-6 pr-2">
                            <div class="input-group mb-3">
                                <input type="text" name="cari" class="form-control"
                                       value="{{ old('cari') }}" placeholder="Search here..">
                                <button type="submit" class="btn btn-outline-secondary"><i
                                        data-feather="search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <thead>
                <tr>
                    <th scope="col 2">No</th>
                    <th scope="col 4">Package</th>
                    <th scope="col 4">Name</th>
                    <th scope="col 2">Description</th>
                    <th scope="col 2">Created At</th>
                    <th scope="col 2">Updated At</th>
                    <th scope="col 2">Custom</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->package->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <div class=" d-flex justify-content-start">
                                @role('admin')
                                <small><a class="px-2 text-dark" href="categories/{{$item->id}}/edit"><i
                                            data-feather="edit-2"></i></a></small>
                                <form action="/categories/{{$item->id}}" class="p-0" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <small>
                                        <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit"><i
                                                data-feather="trash-2"></i></button>
                                    </small>
                                </form>
                                @endrole
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>The Data is empty</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{--    <br/>--}}
    {{--    Halaman : {{ $packages->currentPage() }} <br/>--}}
    {{--    Jumlah Data : {{ $packages->total() }} <br/>--}}
    {{--    Data Per Halaman : {{ $packages->perPage() }} <br/>--}}

    <div class="row no-gutters d-flex justify-content-center">
        <div class="col-2 d-flex justify-content-center pt-3">
            {{$categories->links()}}
        </div>
    </div>
@endsection
