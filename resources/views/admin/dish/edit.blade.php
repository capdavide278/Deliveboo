@extends('admin.layout.app')

@section('content')
    {{-- @dump($errors->all())
    @dump(Auth::user()->name) --}}
    {{-- @dd($errors->get('tags.*')) --}}

    <h1>Create dish</h1>
    <form action="{{ route('admin.dish.store') }}" method="post" novalidate enctype="multipart/form-data">
        
        @csrf

        <div class="mb-3">
            <label class="form-label" for="name">name</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $dish->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">description</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $dish->description) }}">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">price</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price', $dish->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- TODO modificare form --}}
        {{-- <div class="mb-3">
            <label class="form-label" for="is_visible">is_visible</label>
            <input class="form-control @error('is_visible') is-invalid @enderror" type="checkbox" name="is_visible" id="is_visible" value="{{ old('is_visible') }}">
            @error('is_visible')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection        