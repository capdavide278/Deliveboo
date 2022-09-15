@extends('admin.layout.app')
@section('content')

    {{-- messaggio eliminazione piatto --}}
    @if (session('deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('deleted')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
            <div class="row justify-content-around">
                @foreach ($dishes as $dish)
                    <div class="card col-3 mb-4 me-1"> {{-- TODO remove INLINE STYLE --}}
                        <div class="card-body"  data-id="{{ $dish->id }}">
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
                                        <button class="btn btn-danger js-delete">Delete
                                        </button>
                                        <section class="overlay d-none">
                                            <form class="col-3 popup" action="{{ route('admin.dish.destroy', ['dish' => $dish->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <h1>Sei sicuro?</h1>
                                                <button type="submit" class="btn btn-warning js-yes">Yes</button>
                                                <button type="button" class="btn btn-danger js-no">No</button>
                                                    </form>

                                        </section>
                                    </div>

                                </div>
                            </div>

                            <a href=# class="card-link fst-italic">debug only [{{$dish->is_visible}}]</a>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>





@endsection

