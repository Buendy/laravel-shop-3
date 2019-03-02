@extends('layouts.app')

@section('title', 'Shop Dashboard')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">

                <div id="navigation-pills">
                    <h2 class="title text-center">Detalles del pedido</h2>
                </div>

                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>Nº pedido</th>

                        <th >Cantidad</th>
                        <th>Precio unitario</th>
                        <th>total</th>


                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cartDetails as $detail)
                        <tr>
                            <th>{{$detail->product->name}}</th>
                            <th>{{ $detail->quantity }}</th>
                            <th>{{$detail->product->price}} &euro;</th>
                            <th>{{ $detail->quantity * $detail->product->price }} &euro;</th>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div>

                </div>
            </div>

        </div>

    @include('partials.footer')

@endsection
