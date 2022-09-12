@extends('admin.layout.app')

@section('content')
    
    <h1>Nome Piatto: {{ $dish->name }}</h1>
    <h2>Descrizione: {{$dish->description}}</h2>
    <h2>Prezzo: {{$dish->price}}</h2>
    <h2>{{$dish->is_visible}}</h2>

@endsection