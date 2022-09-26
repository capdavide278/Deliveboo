{{-- @extends('admin.layout.app')
@section('content') --}}
    {{-- <table class="table table-striped">
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
        <tbody> --}}
            {{-- @foreach($restaurants as $restaurant)
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-7">
                            <img src="{{asset('storage/' . $restaurant->image)}}" class="max-width" alt="{{$restaurant->name_restaurant}}">
                        </div>
                        <div class="col-5">
                            <h1>{{ $restaurant->name_restaurant }}</h1>
                            {{-- <img src="{{asset('storage/' . $restaurant->image)}}" alt=""> 
                            <h3>Telefono: {{ $restaurant->rest_phonenumber}}</h3>
                            
                            <h3>Email: {{$restaurant->rest_email}}</h3>
                            <h3>Indirizzo: {{ $restaurant->address}}</h3>
                            <h3>Categorie: @foreach($restaurant->category as $cat)
                                                {{$cat->name}}
                                            @endforeach</h3>

                            <a href="{{route('admin.dish.create')}}">
                                <button class="btn btn-success"  type="submit">Add Dish</button>
                            </a>
                        </div>
                    </div> 
                    

                    {{-- @if(Auth::id() == $restaurant->user_id)
                        <a href="{{ route('admin.restaurant.edit', ['restaurant' => $restaurant]) }}" class="btn btn-warning">Edit</a>
                    @endif 

                </div>
            @endforeach --}}




                {{-- @foreach ($restaurants as $restaurant)
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

                                <form action="{{ route('admin.restaurant.destroy', ['restaurant' => $restaurant]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger"  type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach --}}

        {{-- </tbody>
    </table> --}}
{{-- @endsection --}}
