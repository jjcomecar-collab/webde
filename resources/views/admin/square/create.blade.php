<form action="{{ route('admin.squares.store') }}" method="POST">
@csrf

<input name="titulo" class="form-control" placeholder="Título">
<input name="url" class="form-control" placeholder="/ruta">
<input name="icono" class="form-control" placeholder="bi bi-activity">
<input name="color" class="form-control" placeholder="item-cyan">
<input name="orden" type="number" class="form-control" value="0">

<label>
    <input type="checkbox" name="activo" checked> Activo
</label>

<button class="btn btn-primary">Guardar</button>
</form>
