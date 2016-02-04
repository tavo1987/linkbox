@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="columns">

            <h1 class="text-center">Crear nuevo Sitios</h1> 
            <hr>           

            {!!Form::open(['route'=>'admin.sites.store','method' => 'POST'])!!}

                @include('admin.sites.partials.fields')

                {!! Form::submit('GUARDAR',['class'=>'button radius small success']) !!}
                {!! Form::hidden('user',Auth::user()->id) !!}

            {!!Form::close()!!}
        </div>
            
    </div>


@stop