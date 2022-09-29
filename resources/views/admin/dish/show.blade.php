@extends('admin.layout.app')

@section('content')


    <div class="container align-items-center">
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
        <div class="row vh-height justify-content-center align-items-center">
            <div class="card border-backg col-sm-12 col-12"> {{-- TODO remove INLINE STYLE --}}
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-12 mt-3">
                        @if ($dish->image)
                            <img src="{{$dish->image}}" class="max-width img-dish" alt="">
                        @endif
                            <img src="{{asset('storage/' . $dish->image)}}" class="max-width img-dish" alt="">
                    </div>

                  <div class="col-md-6 col-sm-12">
                    <h3>{{ $dish->name }}</h3>
                    <p>{{$dish->description}}</p>
                    <p>Prezzo: {{$dish->price}} €</p>
                    @if ($dish->is_visible == 1)
                                      <p> Piatto nel menù</p>
                                  @else
                                       <p> Piatto non nel menù</p>
                                  @endif
                    <a href="{{route('admin.dish.index')}}" class="btn btn-success me-3">Dish List</a>
                    <a href="{{route('admin.home')}}" class="btn btn-primary">Dashboard</a>
                  </div>
                </div>

                </div>
            </div>
        </div>

    </div>




@endsection
