@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuario Nuevo
                </div>
                @if(session("status") == 500)
                    <div class="alert alert-danger">
                        {{session("message")}}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('usuarios')}}" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select required name="rol" class="form-control">
                                <option value="">Seleccione un rol</option>
                                @foreach($roles as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="justify-content-end">
                            <input type="submit" value="Guardar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
