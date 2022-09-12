@extends('admin.layout.app')
@section('content')
    <table class="table table-striped">
        <thead>
            <th>
                nome
            </th>
            <th>
                indirizzo
            </th>
            <th>
                phone
            </th>
        </thead>
        <tbody> 
                @foreach ($dishes as $dish)
                    <tr>
                        <td>
                            {{$dish->name}}
                        </td>
                        <td>
                            {{$dish->description}}
                        </td>
                        <td>
                            {{$dish->price}}
                        </td>
                        <td>
                            {{$dish->is_visible}}
                        </td>
                        <td class="actions">
                            <a href="{{ route('admin.dish.show', ['dish' => $dish]) }}" class="btn btn-primary">View</a>
                            
                            @if(Auth::id() == $dish->restaurant_id)
                                <a href="{{ route('admin.dish.edit', ['dish' => $dish]) }}" class="btn btn-warning">Edit</a>
                                {{-- DESTROY FORM --}}
                                <form action="{{ route('admin.dish.destroy', ['dish' => $dish]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
        
                                    <button class="btn btn-danger"  type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>    
                @endforeach        
        </tbody>
    </table>
@endsection