@extends('admin.layout.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 30rem; min-height: 20rem"> {{-- TODO remove INLINE STYLE --}}
            <div class="card-body">
              <h3 class="card-title">{{ $dish->name }}</h5>
              <p class="card-text">{{$dish->description}}</p>
              <p class="card-text">Prezzo: {{$dish->price}}</p>
              <a href="{{route('admin.dish.index')}}" class="btn btn-danger">Indietro</a>
              <a href=# class="card-link fst-italic">debug only [{{$dish->is_visible}}]</a>
            </div>
          </div>
    </div>




@endsection
