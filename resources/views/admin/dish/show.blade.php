@extends('admin.layout.app')

@section('content')


    <div class="container">
         {{-- messaggio creazione piatto --}}
        @if (session('create'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('create')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- messaggio edit piatto --}}
        @if (session('edit'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('edit')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card" style="width: 20rem; min-height: 10rem"> {{-- TODO remove INLINE STYLE --}}
            <div class="card-body">
              <img class="card-img-top" src="{{asset('storage/' . $dish->image)}}" alt="">
              <h3 class="card-title text-uppercase">{{ $dish->name }}</h5>
              <p class="card-text">{{$dish->description}}</p>
              <p class="card-text">Prezzo: {{$dish->price}} €</p>
              @if ($dish->is_visible == 1)
                                <p class="card-text"> Piatto nel menù</p>
                            @else
                                 <p class="card-text"> Piatto non nel menù</p>
                            @endif
              <a href="{{route('admin.dish.index')}}" class="btn btn-success me-3">Dish List</a>
              <a href="{{route('admin.home')}}" class="btn btn-primary">Dashboard</a>

            </div>
          </div>
    </div>




@endsection
