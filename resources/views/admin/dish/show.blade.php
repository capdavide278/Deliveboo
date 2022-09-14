@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 20rem; min-height: 10rem"> {{-- TODO remove INLINE STYLE --}}
            <div class="card-body">
              <img class="card-img-top" src="{{asset('storage/' . $dish->image)}}" alt="">
              <h3 class="card-title">{{ $dish->name }}</h5>
              <p class="card-text">{{$dish->description}}</p>
              <p class="card-text">Prezzo: {{$dish->price}} €</p>
              <a href="{{route('admin.dish.index')}}" class="btn btn-danger">Indietro</a>
              <a href=# class="card-link fst-italic">debug only [{{$dish->is_visible}}]</a>
            </div>
          </div>
    </div>




@endsection
