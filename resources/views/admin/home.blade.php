@extends('admin.layout.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <div class="container">
            @if (session('create'))
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                {{session('create')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-sm-6 col-md-12">
                <div id="restaurant-card" class="card">
                    <div class="celeste card-header">{{ __('Il tuo Ristorante') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            @foreach($restaurants as $restaurant)
                            <div class="container">
                              <div class="row justify-content-center align-items-center">
                                <div class="col-sm-12 col-md-6 text-center">
                                  <img src="{{asset('storage/' . $restaurant->image)}}" class="max-width" alt="{{$restaurant->name_restaurant}}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-center">
                                  <h1 class="text-uppercase">{{ $restaurant->name_restaurant }}</h1>
                                
                                  <h3>Telefono: {{ $restaurant->rest_phonenumber}}</h3>
                                  <h3>Email: {{$restaurant->rest_email}}</h3>
                                  <h3>Indirizzo: {{ $restaurant->address}}</h3>
                                  <h3>Categorie: @foreach($restaurant->category as $cat)
                                                      {{$cat->name}}
                                                  @endforeach</h3>

                                  <a href="{{route('admin.dish.create')}}">
                                      <button class="btn btn-primary me-3"  type="submit">Add Dish</button>
                                  </a>
                                  <a class="col-3" href="{{route('admin.dish.index')}}">
                                      <button class="btn btn-warning me-3"  type="submit">Your Dishes</button>
                                  </a>
                                  <a href="{{route('admin.transaction')}}">
                                      <button class="btn btn-success me-3"  type="submit">Transaction</button>
                                  </a>
                                </div>
                              </div>
                                

                                <h2 class="mt-3">Statistiche vendite</h2>

                                <div>
                                    <canvas class="mb-3 mt-2" id="charttransaction"></canvas>
                                </div>

    <script>
        const transaction = @json($transactions);
        const numbertransaction = Object.values(transaction);
        console.log(numbertransaction)
        const labels = [
            'Gennaio',
            'Febbraio',
            'Marzo',
            'Aprile',
            'Maggio',
            'Giugno',
            'Luglio',
            'Agosto',
            'Settembre',
            'Ottobre',
            'Novembre',
            'Dicembre'
        ];

        const datatransaction = {
            labels: labels,
            datasets: [{
                label: 'Statistiche ordini per mese',
                backgroundColor: '#2d424d',
                borderColor: '#29988c',
                data: numbertransaction,
            }]
        };

        const configtransaction = {
            type: 'line',
            data: datatransaction,
            options: {}
        };


        const charttransaction = new Chart(
            document.getElementById('charttransaction'),
            configtransaction
        );


    </script>
                            </div>
                        @endforeach

                        </div>
                    </div>

                </div>


            </div>

        </div>
</div>
@endsection
