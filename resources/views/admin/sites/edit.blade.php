@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="columns">

            <h1 class="text-center">Crear nuevo Sitios</h1> 
            <hr>           

            {!!Form::model($site,['route'=>'admin.sites.update','method' => 'PUT'])!!}

                @include('admin.sites.partials.fields')

                {!!Form::submit('Actualizar',['class'=>'button small success radius']);!!}

            {!!Form::close()!!}
        </div>
            
    </div>


@stop