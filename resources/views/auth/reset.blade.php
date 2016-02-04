
@extends('layouts.main')



@section('content')
    <div class="row">
        <div class="columns large-12">

            <h2>Ingresa nueva contraseña</h2>
            {!! Form::open(['route'=>'password.reset','method'=>'POST']) !!}

                {!! Form::hidden('token',$token) !!}
                {!! Form::email('email',old('email'),['class'=>'radius','placeholder'=>'Email']) !!}
                {!! Form::password('password',['class'=>'radius','placeholder'=>'contraseña']) !!}
                {!! Form::password('password_confirmation',['class'=>'radius','placeholder'=>'confirmar contraseña']) !!}
                {!! Form::submit('Restablecer contraseña',['class'=>'button success small radius'])!!}

            {!! Form::close() !!}
        </div>
    </div>
@stop