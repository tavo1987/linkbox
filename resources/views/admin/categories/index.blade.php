@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="columns">
            <div class="panel">

                <h1 class="text-center">Categorias</h1>

                <hr>
                <a  class="button small success radius" href="{{route('admin.categories.create')}}">Agregar nuevo sitio</a>

                <table>
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                    </thead>
                    @foreach ($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->user->name}}</td>

                            <td>
                                <a href="{{route('admin.categories.edit',$category->id)}}" class="button  tiny success radius">Editar</a>
                                <a href="#" class="button  tiny warning radius" href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    {{--{!! $categories->render() !!}--}}
                </table>



            </div>

        </div>
    </div>


@stop