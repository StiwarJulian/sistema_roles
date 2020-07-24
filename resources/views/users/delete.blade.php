<form action="{{ route('usuarios.destroy', $user->id) }}" method="post" style="display: inline-block">
    @method('DELETE')
    @csrf

    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

</form>
