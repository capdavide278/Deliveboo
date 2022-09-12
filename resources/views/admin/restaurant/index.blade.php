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
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>
                            {{$restaurant->name_restaurant}}
                        </td>
                        <td>
                            {{$restaurant->address}}
                        </td>
                        <td>
                            {{$restaurant->rest_phonenumber}}
                        </td>
                        <td class="actions">
                            <a href="{{ route('admin.restaurant.show', ['restaurant' => $restaurant]) }}" class="btn btn-primary">View</a>
                            
                            @if(Auth::id() == $restaurant->user_id)
                                <a href="{{ route('admin.restaurant.edit', ['restaurant' => $restaurant]) }}" class="btn btn-warning">Edit</a>
                                {{-- DESTROY FORM --}}
                                <form action="{{ route('admin.restaurant.destroy', ['restaurant' => $restaurant]) }}" method="POST">
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