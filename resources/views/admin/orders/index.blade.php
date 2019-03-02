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
                    <h2 class="title text-center">Listado de pedido pendientes</h2>
                </div>
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nº pedido</th>
                            <th>Nombre del usuario</th>
                            <th>Fecha del pedido</th>
                            <th>Total</th>
                            <th colspan="4" class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($carts as $cart)
                            <tr>
                                <th>{{$cart->id}}</th>
                                <th>{{$cart->user->name}}</th>
                                <th>{{$cart->order_date}}</th>
                                <th>{{$cart->total}} &euro;</th>
                                <th colspan="4" class="text-center">
                                    <a href="{{url('/admin/orders/' . $cart->id)}}" rel="tooltip" title=""
                                       class="btn btn-info btn-simple btn-sm" data-original-title="Detalles">
                                        <i class="fa fa-info"></i>
                                        <div class="ripple-container"></div>
                                    </a>

                                    <a href="{{url('/admin/orders/'. $cart->id . '/accept')}}" rel="tooltip" title=""
                                       class="btn btn-success btn-simple btn-sm" data-original-title="Aceptar pedido">
                                        <i class="material-icons">done</i>
                                        <div class="ripple-container"></div>
                                    </a>
                                    <form action="{{ url('/cart/destroy')}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="order_id" value="{{ $cart->id }}">
                                        <button type="submit" rel="tooltip" title="Eliminar pedido"
                                                class="btn btn-danger btn-simple btn-sm">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                </th>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    @include('partials.footer')

@endsection
