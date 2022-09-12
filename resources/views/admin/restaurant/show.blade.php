@extends('admin.layout.app')

@section('content')
    <h1>Nome ristorante: {{ $restaurant->name_restaurant }}</h1>
    <h2>Numero di telefono: {{ $restaurant->rest_phonenumber}}</h2>
    <h2>Email: {{$restaurant->rest_email}}</h2>
    <h3>Indirizzo: {{ $restaurant->address}}</h3>
    <a href="{{route('admin.dish.create')}}">
        <button class="btn btn-success"  type="submit">Add Dish</button> 
    </a>
    {{-- TODO come passare l id del ristorante al create --}}
@endsection