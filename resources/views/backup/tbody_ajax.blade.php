@extends('layouts.dashboard')

@section('title', $title)
@section('header', $header)

@section('content')
    {{--    <div class="row no-gutters">--}}
    {{--        @role('admin')--}}
    {{--        <ul class="list-group">--}}
    {{--            <li class="list-group-item no-gutters py-3">--}}
    {{--                <div class="col">--}}
    {{--                    <div class="card border-0 shadow bg-white" style="width: 19rem; height: 10rem">--}}
    {{--                        <div class="row no-gutters" style="height: 10rem;">--}}
    {{--                            <div class="col-md-4 pl-5 d-flex justify-content-center">--}}
    {{--                                <img class="img-fluid text-primary" style="width: 50px; height: auto;"--}}
    {{--                                     src="{{asset('images/package.svg')}}" class="card-img" alt="...">--}}
    {{--                            </div>--}}
    {{--                            <div class="col-md-8 d-flex justify-content-center">--}}
    {{--                                <div class="card-body d-flex align-items-center text-center">--}}
    {{--                                    <a href="packages/create" class="text-decoration-none text-dark">--}}
    {{--                                        <h3>Add New <i data-feather="plus-circle"></i></h3>--}}
    {{--                                    </a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
    {{--        @endrole--}}
    {{--        @foreach($packages as $item)--}}
    {{--            <ul class="list-group">--}}
    {{--                <li class="list-group-item no-gutters border-0 py-3">--}}
    {{--                    <div class="col">--}}
    {{--                        <div class="card border-0 shadow bg-info" style="width: 19rem; height: 10rem;">--}}
    {{--                            <div class="card-body bg-white">--}}
    {{--                                <h3 class="text-center pt-4">{{$item->name}}</h3>--}}
    {{--                                <div class=" d-flex justify-content-center">--}}
    {{--                                    <small><a class="px-2 text-dark" href=""><i data-feather="eye"></i></a></small>--}}
    {{--                                    @role('admin')--}}
    {{--                                    <small><a class="px-2 text-dark" href="packages/{{$item->id}}/edit"><i--}}
    {{--                                                data-feather="edit-2"></i></a></small>--}}
    {{--                                    <form action="/packages/{{$item->id}}" class="p-0" method="POST">--}}
    {{--                                        @csrf--}}
    {{--                                        @method("DELETE")--}}
    {{--                                        <small>--}}
    {{--                                            <button class="px-1 text-dark btn btn-link p-0 mtn15" type="submit"><i--}}
    {{--                                                    data-feather="trash-2"></i></button>--}}
    {{--                                        </small>--}}
    {{--                                    </form>--}}
    {{--                                    @endrole--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        @endforeach--}}
    {{--    </div>--}}
    <div class="row no-gutters">
        <div class="col-12">
            <table class="table ">
                <div class="row no-gutters">
                    <div class="col-2 text-start">
                        <div class="-flex align-items-center py-2 pr-2">
                            <a href="packages/create" class="text-decoration-none text-dark">
                                <h5>Add New <i data-feather="plus-circle"></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="offset-4 col-6 pr-2">
                        <div class="input-group mb-3">
                            <input type="text" name="packageSearch" id="packageSearch" class="form-control"
                                   value="" placeholder="Typed here..">
                            @csrf
                            <button type="button" name="search" id="search" class="btn btn-outline-secondary"><i
                                    data-feather="search"></i></button>

                        </div>
                    </div>
                </div>
                <thead>
                <tr>
                    <th scope="col 4">Name</th>
                    <th scope="col 2">Description</th>
                    <th scope="col 2">Created At</th>
                    <th scope="col 2">Updated At</th>
                    <th scope="col 2">Custom</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            load_data('');

            function load_data(packageSearch_query = '') {
                var _token = $("input[name=_token]").val();
                $.ajax({
                    url: "{{ route('package.action') }}",
                    method: "POST",
                    data: {packageSearch_query: packageSearch_query, _token: _token},
                    dataType: "json",
                    success: function (data) {
                        var output = '';
                        if (data.length > 0) {
                            for (var count = 0; count < data.length; count++) {
                                output += '<tr>';
                                output += '<td>' + data[count].name + '</td>';
                                output += '<td>' + data[count].description + '</td>';
                                output += '<td>' + data[count].created_at + '</td>';
                                output += '<td>' + data[count].updated_at + '</td>';
                                output += '</tr>';
                            }
                        } else {
                            output += '<tr>';
                            output += '<td colspan="6">No Data Found</td>';
                            output += '</tr>';
                        }
                        $('tbody').html(output);
                    }
                });
            }

            $('#search').click(function () {
                var packageSearch_query = $('#packageSearch').val();
                load_data(packageSearch_query);
            });

        });
    </script>
@endsection
