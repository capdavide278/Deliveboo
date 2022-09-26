@extends('admin.layout.app')
@section('content')



    <div class="container">
        <h1>Le tue transazioni</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Cognome</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Totale acquisto</th>
                    <th>Data e ora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction as $element)
                    <tr data-id="{{ $element->id }}">
                        <td>{{ $element->name }}</td>
                        <td>{{ $element->lastname }}</td>
                        <td>{{ $element->email }}</td>
                        <td>{{ $element->address }}</td>
                        <td>{{ $element->phonenumber }}</td>
                        <td>{{ $element->total }}</td>
                        <td>{{ $element->date }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @endsection
