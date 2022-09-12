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

                    {{ __('You are logged in!') }}
                    <a href="{{asset('admin/restaurant')}}">i tuoi ristoranti</a>
                    <a href="{{asset('admin/restaurant')}}">piatti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
