@extends('layouts.index')



@section('content')

    <div class="row">
        <div class="col-xs-12">

            <h1>Editando usuario: <strong class="success"><small>{{$user->name}}</small></strong> </h1>

         {!!Form::model($user, ['route'=>['admin.users.update',$user->id],'method'=>'PUT'])!!}
            
            @include('admin.users.partials.fields')

            {!!Form::submit('Actualizar',['class'=>'btn btn-success'])!!}
          
        {!!Form::close()!!}
    </div>
</div>
@stop