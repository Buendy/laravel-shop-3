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
                    <h2 class="title text-center">Dashboard</h2>

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#carrito" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i> Carrito de compras
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#carritos" role="tab" data-toggle="tab">
                                <i class="material-icons">schedule</i> Pedidos realizados
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tab-space">

                        <div class="tab-pane active" id="carrito">
                            <div class="text-center">
                                <div>
                                    <p>
                                        Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos
                                    </p>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-2 text-center">Nombre</th>
                                    <th class="text-right">Precio</th>
                                    <th class="text-right">Cantidad</th>
                                    <th class="text-right">Subtotal</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(auth()->user()->cart->details as $detail)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $detail->product->featured_image_url }}" height="50">
                                        </td>
                                        <td>
                                            <a href="{{ url('/products/' . $detail->product->id) }}" target="_blank">
                                                {{ $detail->product->name }}
                                            </a>
                                        </td>
                                        <td class="text-right">{{ $detail->product->price }} &euro;</td>
                                        <td class="text-right">{{ $detail->quantity }}</td>
                                        <td class="text-right">{{ $detail->quantity * $detail->product->price }}&euro;</td>
                                        <td class="td-actions text-center">
                                            <a href="{{ url('/products/' . $detail->product->id) }}" target="_blank"
                                               rel="tooltip" title="Ver Producto"
                                               class="btn btn-info btn-sm"
                                            >
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <form action="{{ url('/cart') }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                                <button type="submit" rel="tooltip" title="Eliminar"
                                                        class="btn btn-danger btn-sm"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if(auth()->user()->cart->details->count())
                                <div class="text-center">
                                    <p>
                                        <strong>Importe a pagar:</strong> {{ auth()->user()->cart->total }}€
                                    </p>
                                </div>
                                <div class="text-center">

                                    <form action="{{ url('/order') }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary btn-round">
                                            <i class="material-icons">done</i> Realizar pedido
                                        </button>
                                    </form>

                                </div>
                            @endif

                        </div>

                        <div class="tab-pane" id="carritos">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th>Nº pedido</th>
                                    <th>Fecha pedido</th>
                                    <th>Estado del pedido</th>
                                    <th>Acciones</th>
                                </tr>

                                </thead>
                                <tbody class="text-center">
                                @foreach($ordersDone as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td class="text-success">{{$order->status}}</td>
                                        <td>
                                            <a href="{{url('/cart/' . $order->id)}}" type="submit" rel="tooltip" title="Descargar factura"
                                               class="btn btn-info btn-simple btn-sm">
                                                <i class="material-icons">attachment</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td class="text-warning">{{$order->status}}</td>
                                        <td>
                                            <form action="{{ url('/cart/destroy')}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <button type="submit" rel="tooltip" title="Eliminar pedido"
                                                        class="btn btn-danger btn-simple btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    @include('partials.footer')

@endsection
