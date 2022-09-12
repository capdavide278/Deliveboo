@extends('admin.layout.app')

@section('content')
    {{-- @dump($errors->all())
    @dump(Auth::user()->name) --}}
    {{-- @dd($errors->get('tags.*')) --}}

    <h1>Create new post</h1>
    <form action="{{ route('admin.restaurant.store') }}" method="post" novalidate enctype="multipart/form-data">
        
        @csrf

        <div class="mb-3">
            <label class="form-label" for="name_restaurant">name_restaurant</label>
            <input class="form-control @error('name_restaurant') is-invalid @enderror" type="text" name="name_restaurant" id="name_restaurant" value="{{ old('name_restaurant') }}">
            @error('name_restaurant')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="address">address</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_phonenumber">rest_phonenumber</label>
            <input class="form-control @error('rest_phonenumber') is-invalid @enderror" type="text" name="rest_phonenumber" id="rest_phonenumber" value="{{ old('rest_phonenumber') }}">
            @error('rest_phonenumber')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_email">rest_email</label>
            <input class="form-control @error('rest_email') is-invalid @enderror" type="text" name="rest_email" id="rest_email" value="{{ old('rest_email') }}">
            @error('rest_email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection