@extends('admin.layout.app')

@section('content')

<div class="container">
    <h3>Edit Restaurant: </h3>
    <h1>{{ old('name_restaurant', $restaurant->name_restaurant) }}</h1>
    <form action="{{ route('admin.restaurant.update', ['restaurant' => $restaurant])}}" method="post" novalidate enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="name_restaurant">Name Restaurant *</label>
            <input class="form-control @error('name_restaurant') is-invalid @enderror" type="text"  maxlength="50" name="name_restaurant" id="name_restaurant" value="{{ old('name_restaurant', $restaurant->name_restaurant) }}" required>
            @error('name_restaurant')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="address">Address *</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $restaurant->address) }}" required>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_phonenumber">Restaurant phonenumber</label>
            <input class="form-control @error('rest_phonenumber') is-invalid @enderror" type="text" minlength="6" maxlength="15" name="rest_phonenumber" id="rest_phonenumber" value="{{ old('rest_phonenumber', $restaurant->rest_phonenumber) }}">
            @error('rest_phonenumber')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_email">Restaurant Email *</label>
            <input class="form-control @error('rest_email') is-invalid @enderror" type="text" name="rest_email" id="rest_email" value="{{ old('rest_email', $restaurant->rest_email) }}" required>
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
