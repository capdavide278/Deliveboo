@extends('admin.layout.app')
@section('content')

    <div class="container">
        
                    
                        <tr>
                            <div class="container">
                                    <div class="row justify-content-around">
                                        @foreach ($dishes as $dish)
                                            <div class="card col-3 mb-4 me-1"> {{-- TODO remove INLINE STYLE --}}
                                                <div class="card-body">
                                                    <img class="card-img-top" src="{{asset('storage/' . $dish->image)}}" alt="">
                                                    <h3 class="card-title">{{ $dish->name }}</h5>
                                                    <p class="card-text">{{$dish->description}}</p>
                                                    <p class="card-text">Prezzo: {{$dish->price}} €</p>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row justify-content-center">
                                                                <a href="{{ route('admin.dish.show', ['dish' => $dish]) }}" class="btn btn-primary col-3 me-3">View</a>
                                                                <a href="{{ route('admin.dish.edit', ['dish' => $dish]) }}" class="btn btn-warning col-3">Edit</a>
                                                                {{-- delete button --}}
                                                                <form class="col-3" action="{{ route('admin.dish.destroy', ['dish' => $dish]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger"  type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <a href=# class="card-link fst-italic">debug only [{{$dish->is_visible}}]</a>
                                                </div>
                                            </div>  
                                        @endforeach          
                                    </div>                         
                            </div>
                   
            </tbody>
        
    </div>

@endsection

