@extends('admin.layout.app')

@section('content')
    {{-- @dump($errors->all())
    @dump(Auth::user()->name) --}}
    {{-- @dd($errors->get('tags.*')) --}}

    <h1>Create new dish</h1>
    <form action="{{ route('admin.dish.store') }}" method="post" novalidate enctype="multipart/form-data">
        
        @csrf

        <div class="mb-3">
            <label class="form-label" for="name">Name *</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" maxlength="50" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" type="text" maxlength="100" name="description" id="description" value="{{ old('description') }}"></textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="price">Price *</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- TODO modificare form --}}
        
            <div>               
                <input type="checkbox" name="is_visible" class="form-check-input switch-input" value="1" {{ old('is_visible') ? 'checked="1"' : '0' }} checked/>
                <label for="is_visible">Piatto nel Menù</label>
            </div>

          
            
            
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        {{-- @dd() --}}
@endsection