@extends('layouts.index')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usuarios</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
           Usuarios
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 center">
                    <a class="btn btn-success" href="{{route('admin.users.create')}}">Agregar Nuevo usuario</a>
                </div>
            </div>

            <hr>
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="users-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->active}}</td>
                                <td>
                                    {!!Form::open(['route'=>['admin.users.destroy',$user], 'method' => 'DELETE'])!!}
                                        <button type="submit" class="btn btn-danger btn-sm"><icon class="fa fa-close"></icon> Eliminar</button>
                                        <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-success btn-sm" href="#"><i class="fa fa-edit"></i> Editar</a>
                                    {!!Form::close()!!}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="row">
                    <div class="col-xs-12 center-block">
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop