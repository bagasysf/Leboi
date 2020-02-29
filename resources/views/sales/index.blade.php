@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    @include('layouts.be-header-with-export')

    <div class="row no-gutters">
        <div class="col-12">
            <table class="table ">
                <div class="row no-gutters">
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
                    <th scope="col 2">Created At</th>
                    <th scope="col 2">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @forelse($checkout as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->status}}</td>
                        <td>Rp {{$item->total}}</td>
                        <td>Rp {{$item->created_at}}</td>
                        <td>Rp {{$item->updated_at}}</td>
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
