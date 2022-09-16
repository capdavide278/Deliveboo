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
            <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name" id="name_dish" maxlength="50" required value="{{ old('name', $dish->name) }}">
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
            <input class="form-control price_dish @error('price') is-invalid @enderror" type="text" name="price" id="price_dish" required value="{{ old('price', $dish->price) }}">
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
        <br>
        <button type="submit" class="btn btn-primary me-3">Save</button>
        <a href="{{route('admin.dish.index')}}" class="btn btn-success me-3">Return Dashboard</a>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>

@endsection
