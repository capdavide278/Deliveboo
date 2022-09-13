@extends('admin.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- bottoni un po' più belli --}}
                    <div class="row justify-content-center">
                        <a class="col-3" href="{{route('admin.restaurant.index')}}">
                            <button class="btn btn-primary"  type="submit">Your Restaurants</button>
                        </a>
                        <a class="col-3" href="{{route('admin.dish.index')}}">
                            <button class="btn btn-warning"  type="submit">Your Dishes</button>
                        </a>
                        {{-- <a class="col-3" href="{{route('admin.restaurant.edit')}}">
                            <button class="btn btn-success"  type="submit">Edit Restaurant</button>
                        </a> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
