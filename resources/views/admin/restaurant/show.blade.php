@extends('admin.layout.app')

@section('content')
    <h1>{{ $restaurant->name_restaurant }}</h1>
    <h2>{{ $restaurant->rest_phonenumber}}</h2>
    <h2>{{$restaurant->rest_email}}</h2>
    <h3>{{ $restaurant->address}}</h3>
    <a href="{{route('admin.dish.create')}}">Crea il tuo nuovo piatto</a>
    {{-- TODO come passare l id del ristorante al create --}}
@endsection