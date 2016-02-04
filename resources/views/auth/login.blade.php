<!-- resources/views/auth/login.blade.php -->

@extends('layouts.index')

@section('auth')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-panel panel panel-default">

                    <h3 class="form-title">Inicia Sesión por favor</h3>

                    @if($errors->has())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="panel-body">
                        {!!Form::open(['route'=>'login','method'=>'POST','class'=>'login-form form-inline'])!!}


                            <div class="icons-input">
                                <i class="fa fa-envelope"></i>
                                {!!Form::text('email',null,['placeholder'=>' Email','class'=>'inputs icon-email'])!!}

                            </div>

                            <div class="icons-input">
                                <i class="fa fa-lock"></i>
                                {!!Form::password('password',['placeholder'=>'Contraseña','class'=>'inputs password'])!!}
                            </div>


                            {!!Form::submit('Entrar',['class'=>'button'])!!}

                            <a class="button-forget" href="{{route('password')}}">¿Olvidaste tu contraseña?</a>

                            <a class="button-facebook" href="{{route('login.facebook')}}"><i class="fa fa-facebook"></i>Logeate con Facebook</a>

                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop