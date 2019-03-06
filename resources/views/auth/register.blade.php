@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
    <div class="page-header header-filter" style="background-image: url({{ asset('img/bg7.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">



                        @if($errors->any())
                            <div class="alert alert-danger">

                                <div class="alert-icon">
                                    <i class="material-icons">error_outline</i>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>
                                @foreach($errors->all() as $error)
                                    <p> <b>Error:</b>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        {!! Form::open(['route'=>'register' , 'method'=>'post']) !!}
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Registro</h4>
                        </div>
                        <p class="description text-center">Rellena tus datos</p>
                        <div class="card-body">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                                </span>
                                </div>
                                {{ Form::bsText('name', old('name'), ['placeholder' => 'Nombre...']) }}
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">fingerprint</i>
                                                </span>
                                </div>
                                {{ Form::bsText('username', old('username'), ['placeholder' => 'Nombre de usuario']) }}
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">mail</i>
                                                </span>
                                </div>
                                {{Form::bsEmail('email',  old('email'), ['placeholder' => 'Correo electrónico...'])}}
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">phone</i>
                                                </span>
                                </div>
                                {{ Form::bsPhone('phone', old('phone'), ['placeholder' => 'Número de teléfono...']) }}

                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">home</i>
                                                </span>
                                </div>
                                {{Form::bsText('address', old('address'), ['placeholder' => 'Dirección del usuario...'])}}
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                </div>
                                {{Form::bsPassword('password', ['placeholder' => 'Contraseña...'])}}
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                </div>
                                {{Form::bsPasswordConfirmation('password_confirmation', ['placeholder' => 'Repite la contraseña...'])}}
                            </div>

                        </div>
                        <div class="footer text-center">
                            {{ Form::bsSubmit('Registrar') }}

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
