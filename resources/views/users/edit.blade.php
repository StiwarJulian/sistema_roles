@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Modificar Usuario
                </div>
                @if(session("status") == 500)
                <div class="alert alert-danger">
                    {{session("message")}}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('usuarios/'.$users->id)}}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required name="name" value="{{$users->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required name="email" value="{{$users->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select required name="rol" class="form-control">
                                @foreach( $roles as $key => $value )
                                    @if ( $users->hasRole( $value ) )
                                        <option value="{{ $key }}" >{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="justify-content-end">
                            <input type="submit" value="Modificar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
