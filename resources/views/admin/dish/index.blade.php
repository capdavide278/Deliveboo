@extends('admin.layout.app')
@section('content')

    <div class="container">
        <table class="table table-striped">
            <thead class="table-dark">
                <th scope="col">Nome Pietanza</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col" class="fst-italic">DebugOnly</th> {{-- TODO remove debug only --}}
                <th scope="col" colspan="3" class="fst-italic">DebugOnly</th>
            </thead>
            <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <th scope="row">{{$dish->name}}</th>
                            <td>{{$dish->description}}</td>
                            <td>{{$dish->price}}</td>
                            <td>{{$dish->is_visible}}</td>
                            <td>
                                <a href="{{ route('admin.dish.show', ['dish' => $dish]) }}" class="btn btn-primary">View</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.dish.edit', ['dish' => $dish]) }}" class="btn btn-warning">Edit</a>
                            </td>
                            {{-- destroy action --}}
                            <td>
                                <form action="{{ route('admin.dish.destroy', ['dish' => $dish]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"  type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

@endsection

