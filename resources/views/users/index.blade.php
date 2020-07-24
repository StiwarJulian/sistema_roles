@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Listado de Usuarios
                </div>
                @if(session("status") == 200)
                    <div class="alert alert-success">
                        {{session("message")}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row justify-content-end mr-2 pb-2">
                        <a href="{{ url('/usuarios/create') }}" class="btn btn-success">Nuevo Usuario</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles->implode( 'name', ',' )}}</td>
                                <td>
                                    <a href="{{url('/usuarios/'.$user->id.'/edit')}}" class="btn btn-primary btn-small">Editar</a>
                                    <a href="{{url('/usuarios/'.$user->id)}}" class="btn btn-danger btn-small">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
