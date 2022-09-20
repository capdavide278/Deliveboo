@extends('admin.layout.app')

@section('content')

    <div class="container">
        <h1>Inserisci i dati del tuo Ristorante</h1>
    <form id="rest_form" name="rest_form" action="{{ route('admin.restaurant.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <h2 id="controlloValidazione" class="red"></h2>

        <div class="mb-3">
            <label class="form-label" for="name_restaurant">Name Restaurant *</label>
            <input class="form-control @error('name_restaurant') is-invalid @enderror" type="text" name="name_restaurant" maxlength="50" id="name_restaurant" value="{{ old('name_restaurant') }}">
            @error('name_restaurant')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

{{--         <div class="mb-3">
            <label class="form-label" for="image">Image Restaurant</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label class="form-label" for="address">Address *</label>
            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_phonenumber">Restaurant Phonenumber</label>
            <input class="form-control @error('rest_phonenumber') is-invalid @enderror" type="text" maxlength="10" name="rest_phonenumber" id="rest_phonenumber" value="{{ old('rest_phonenumber') }}">
            @error('rest_phonenumber')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="rest_email">Restaurant Email *</label>
            <input class="form-control @error('rest_email') is-invalid @enderror" type="email" name="rest_email" id="rest_email" value="{{ old('rest_email') }}">
            @error('rest_email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <fieldset class="mb-3">
            <legend>Categories*</legend>
            <div id="category_alert" class="red"></div>
            @foreach ($categories as $category)
                <div class="form-check">
                    <input
                    class="form-check-input checkbox"
                    type="checkbox"
                    {{--  aggiungendo [] al nome abbiamo un array come valore di ritorno --}}
                        name="categories[]"
                        value="{{ $category->id }}"
                        id="category-{{ $category->id }}"
                        @if(in_array($category->id, old('categories') ?: [])) checked @endif
                    >
                    <label class="form-check-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach


            @foreach ($errors->get('categories.*') as $messagges)
                @foreach ($messagges as $message)

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endforeach
            @endforeach
        </fieldset>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>

@endsection
