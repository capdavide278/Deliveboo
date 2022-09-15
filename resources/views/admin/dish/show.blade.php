@extends('admin.layout.app')

@section('content')

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
