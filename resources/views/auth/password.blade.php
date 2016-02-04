<!-- resources/views/auth/login.blade.php -->

@extends('layouts.main')



@section('content')


    <div class="row">

        <div class="large-12 columns">
            <h2>Ingresa tu email para el reseteo de tu contraseña</h2>


            {!! Form::open(['route' => 'password','method' => 'POST']) !!}

                    {!! Form::text('email',old('email'),['class'=>'radius','placeholder'=>'Introduce tu email']) !!}
                    {!! Form::submit('Resetear contraseña',['class'=>'radius button success small']) !!}

            {!! Form::close() !!}

        </div>

    </div>

@stop