@extends('admin.layout.app')

@section('content')
    {{-- @dump($errors->all())
    @dump(Auth::user()->name) --}}
    {{-- @dd($errors->get('tags.*')) --}}

    <div class="container">
        <h1>Edit dish</h1>
    <form action="{{ route('admin.dish.update', ['dish' => $dish]) }}" method="post" novalidate enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="name">Name *</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"  maxlength="50" required id="name" value="{{ old('name', $dish->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" maxlength="100" id="description" value="{{ old('description', $dish->description) }}">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">Price *</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" required value="{{ old('price', $dish->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <input type="checkbox" name="is_visible" class="form-check-input switch-input" value="1" {{ old('is_visible', $dish->is_visible) ? 'checked="1"' : '0' }}/>
            <label for="is_visible">Piatto nel Menù *</label>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>

@endsection
