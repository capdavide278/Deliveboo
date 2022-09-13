@extends('admin.layout.app')

@section('content')

    <div class="container">
        <h1>Nome Piatto: {{ $dish->name }}</h1>
        <h2>Descrizione: {{$dish->description}}</h2>
        <h2>Prezzo: {{$dish->price}}</h2>
        <h2>{{$dish->is_visible}}</h2>

        <a href="{{route('admin.dish.index')}}" class="btn btn-danger">Indietro</a>

    </div>



@endsection
