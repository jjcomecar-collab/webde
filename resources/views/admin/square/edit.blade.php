<form action="{{ route('admin.squares.update', $square) }}" method="POST">
@csrf
@method('PUT')

<input name="titulo" value="{{ $square->titulo }}">
<input name="url" value="{{ $square->url }}">
<input name="icono" value="{{ $square->icono }}">
<input name="color" value="{{ $square->color }}">
<input name="orden" value="{{ $square->orden }}">

<input type="checkbox" name="activo" {{ $square->activo ? 'checked' : '' }}>

<button class="btn btn-success">Actualizar</button>
</form>
