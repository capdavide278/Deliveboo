@extends('admin.layout.app')

@section('content')
    <h1>{{ $restaurant->name_restaurant }}</h1>
    <h2>{{ $restaurant->rest_phonenumber}}</h2>
    <h2>{{$restaurant->rest_email}}</h2>
    <h3>{{ $restaurant->address}}</h3>
@endsection