@extends('layouts.app')

@section('body-class', 'login-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" style="background-image: url({{ asset('img/bg7.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    @if($errors->has('username') | $errors->has('password') )
                        <div class="alert alert-danger">

                            <div class="alert-icon">
                                <i class="material-icons">error_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Error:</b> El nombre de usuario o contraseña no es correcto.
                        </div>
                    @endif

                </div>

                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">

                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Login</h4>
                        </div>
                        <p class="description text-center">Escribe tus datos</p>
                        <div class="card-body">
                            {!! Form::open(['url'=>'login' , 'method'=>'post']) !!}
                            <div class="input-group">

                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">fingerprint</i>
                                        </span>
                                </div>

                                {{ Form::bsText('username', old('username'), ['placeholder' => 'Nombre de usuario...'])}}

                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">lock_outline</i>
                                        </span>
                                </div>
                                {{ Form::bsPassword('password', ['placeholder' => 'Contraseña...']) }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"
                                           name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    > Recordar Sesión
                                    <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Iniciar Sesión</button>

                        </div>

                        <div class="footer text-center">
                            {{ Form::bsSubmit('Iniciar sesión') }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endsection
