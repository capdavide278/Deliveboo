@extends('admin.layout.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
        <div class="row">
            <div class="col col-md-3 accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Accordion Item #1
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Accordion Item #2
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Accordion Item #3
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
                    </div>
                  </div>
                </div>
              </div>


            <div class="col col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Il tuo Ristorante') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            @foreach($restaurants as $restaurant)
                            <div class="container">
                                <h1 class="text-uppercase">{{ $restaurant->name_restaurant }}</h1>
                                <img src="{{asset('storage/' . $restaurant->image)}}" class="max-width" alt="{{$restaurant->name_restaurant}}">
                                <h3>Telefono: {{ $restaurant->rest_phonenumber}}</h3>
                                <h3>Email: {{$restaurant->rest_email}}</h3>
                                <h3>Indirizzo: {{ $restaurant->address}}</h3>
                                <h3>Categorie: @foreach($restaurant->category as $cat)
                                                    {{$cat->name}}
                                                @endforeach</h3>

                                <a href="{{route('admin.dish.create')}}">
                                    <button class="btn btn-success me-3"  type="submit">Add Dish</button>
                                </a>
                                <a class="col-3" href="{{route('admin.dish.index')}}">
                                    <button class="btn btn-warning me-3"  type="submit">Your Dishes</button>
                                </a>
                                <a href="{{route('admin.transaction')}}">
                                    <button class="btn btn-success me-3"  type="submit">Transaction</button>
                                </a>

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
