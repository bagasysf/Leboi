@forelse($packages as $item)
    <tr>
        <th scope="row">{{$loop->index + 1}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->updated_at}}</td>
        <td>
            <div class=" d-flex justify-content-start">
                @role('admin')
                <small><a class="px-2 text-dark" href="packages/{{$item->id}}/edit"><i
                            data-feather="edit-2"></i></a></small>
                <form action="/packages/{{$item->id}}" class="p-0" method="POST">
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
        <th>The Order is empty</th>
    </tr>
@endforelse
