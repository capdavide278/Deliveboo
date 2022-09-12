@extends('admin.layout.app')

@section('content')
    <h1>{{ $dish->name }}</h1>
    <h2>{{ $dish->description}}</h2>
    <h2>{{$dish->price}}</h2>
    <h2>{{$dish->is_visible}}</h2>
@endsection