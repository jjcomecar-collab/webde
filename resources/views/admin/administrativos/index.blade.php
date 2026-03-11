@extends('adminlte::page')

@section('title', 'Administrativos')

@section('content')

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        Registrar / Editar Administrativo
    </div>

    <div class="card-body">
        <form id="form-admin" method="POST" action="{{ route('administrativo.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id">

            <div class="row">
                <div class="col-md-3">
                    <label>Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>Orden</label>
                    <input type="number" name="orden" id="orden" class="form-control">
                </div>

                <div class="col-md-3 mt-3">
                    <label>Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>

            <button class="btn btn-success mt-3">Guardar</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header bg-dark text-white">
        Lista de Administrativos
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped" id="tabla">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Cargo</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($administrativos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->imagen)
                        <img src="{{ asset('imagenes_administrativos/'.$item->imagen) }}" width="60">
                        @endif
                    </td>
                    <td>{{ $item->cargo }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->orden }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="editar({{ $item }})">
                            Editar
                        </button>

                        <form method="POST"
                              action="{{ route('administrativo.destroy',$item->id) }}"
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
<script>
function editar(item) {
    document.getElementById('id').value = item.id;
    document.getElementById('cargo').value = item.cargo;
    document.getElementById('nombre').value = item.nombre;
    document.getElementById('email').value = item.email;
    document.getElementById('orden').value = item.orden;

    let form = document.getElementById('form-admin');
    form.action = `/administrativo/${item.id}`;
    form.insertAdjacentHTML('beforeend','@method("PUT")');
}
</script>
@endsection
