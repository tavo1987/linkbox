<!-- resources/views/auth/register.blade.php -->
@extends('layouts.main')



@section('content')

    <div class="row">
        <div class="columns large-12">

            <h1>Registrar nuevo usuario</h1>

         {!!Form::open(['route'=>'register','method'=>'POST'])!!}
            
            {!!Form::text('name','',['placeholder'=>'Nombre'])!!}
            {!!Form::text('email','',['placeholder'=>'Email'])!!}

            {!!Form::label('password','Escribe tu password')!!}

            {!!Form::password('password')!!}
            {!!Form::password('password_confirmation')!!}
            

            {!!Form::submit('Guardar',['class'=>'button small success radius'])!!}
          
        {!!Form::close()!!}
    </div>
</div>
@stop