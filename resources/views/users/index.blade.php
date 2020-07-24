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
                        {{ session("message") }}
                    </div>
                @elseif(session("status") == 500)
                    <div class="alert alert-danger">
                        {{ session( "message" ) }}
                    </div>
                @endif
                <div class="card-body">
                    @role("super-admin")
                        <div class="row justify-content-end mr-2 pb-2">
                            <a href="{{ url('/usuarios/create') }}" class="btn btn-success">Nuevo Usuario</a>
                        </div>
                    @endrole
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>
                        <tbody class="text-body">
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles->implode( 'name', ',' )}}</td>
                                <td>
                                    @role("moderador")
                                        <a href="{{ url('/usuarios/' .$user->id. '/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                                    @endrole
                                    @role("super-admin")
                                        @include( 'users.delete', [ 'user' => $user ])
                                    @endrole
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
