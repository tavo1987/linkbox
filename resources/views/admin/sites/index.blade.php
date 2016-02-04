@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="columns">
            <div class="panel">

                <h1 class="text-center">Sitios</h1>
                
                <hr>           
                <a  class="button small success radius" href="{{route('admin.sites.create')}}">Agregar nuevo sitio</a>

                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Link</th>
                        <th>Acciones</th>
                    </thead>
                    @foreach ($sites as $user)

                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td><a href="{{$user->link}}" target="_blank">{{$user->link}}</a></td>
                            
                            <td>
                                <a href="{{route('admin.sites.edit',$user->id)}}" class="button  tiny success radius" href="#">Editar</a>
                                <a href="#" class="button  tiny warning radius" href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                
                    {!! $sites->render() !!}
                
            
            </div>

        </div>
    </div>


@stop