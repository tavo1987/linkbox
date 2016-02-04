<!-- resources/views/auth/register.blade.php -->
@extends('layouts.index')



@section('content')

    <div class="row">

        <div class="col-xs-12">

            <h1>Agregar nuevo usuario</h1>

            {!!Form::open(['route'=>'admin.users.store','method'=>'POST'])!!}
            
                @include('admin.users.partials.fields')

                {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
          
            {!!Form::close()!!}

        </div>
    </div>
@stop