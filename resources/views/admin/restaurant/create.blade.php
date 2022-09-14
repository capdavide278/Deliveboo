@extends('admin.layout.app')

@section('content')
    {{-- @dump($errors->all())
    @dump(Auth::user()->name) --}}
    {{-- @dd($errors->get('tags.*')) --}}
    <div class="container">
        <h1>Inserisci i dati del tuo Ristorante</h1>
    <form action="{{ route('admin.restaurant.store') }}" method="post" novalidate enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label" for="name_restaurant">Name Restaurant *</label>
            <input class="form-control @error('name_restaurant') is-invalid @enderror" type="text" name="name_restaurant" maxlength="50" id="name_restaurant" value="{{ old('name_restaurant') }}" required>
            @error('name_restaurant')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="address">Address *</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}" required>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_phonenumber">Restaurant Phonenumber</label>
            <input class="form-control @error('rest_phonenumber') is-invalid @enderror" type="text" minlenght="6" maxlength="15" name="rest_phonenumber" id="rest_phonenumber" value="{{ old('rest_phonenumber') }}">
            @error('rest_phonenumber')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_email">Restaurant Email *</label>
            <input class="form-control @error('rest_email') is-invalid @enderror" type="text" name="rest_email" id="rest_email" value="{{ old('rest_email') }}" required>
            @error('rest_email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>




        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>

@endsection
