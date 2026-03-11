@extends('adminlte::page')

@section('title', 'Docentes Política')

@section('content')

{{-- ================= FORMULARIO CREATE / EDIT ================= --}}
<div class="card mb-4">
    <div class="card-header">Registrar / Editar Docente</div>
    <div class="card-body">
        <form id="form-docente"
              action="{{ route('docentepolitica.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="form-method" value="POST">

            <div class="row">
                <div class="col-md-4">
                    <input type="text"
                           name="nombre"
                           id="nombre"
                           class="form-control"
                           placeholder="Nombre completo"
                           required>
                </div>

                <div class="col-md-3">
                    <select name="tipo"
                            id="tipo"
                            class="form-control"
                            required>
                        <option value="">-- Tipo --</option>
                        <option value="nombrado">Nombrado</option>
                        <option value="contratado">Contratado</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="file"
                           name="imagen"
                           class="form-control">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100"
                            id="btn-submit">
                        Guardar
                    </button>
                </div>

                <div class="col-md-12 mt-2">
                    <input type="text"
                           name="descripcion"
                           id="descripcion"
                           class="form-control"
                           placeholder="Descripción">
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ================= TABLA ================= --}}
<div class="card">
    <div class="card-header">Listado de Docentes</div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th width="160">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docentes as $d)
                <tr>
                    <td class="text-center">
                        <img src="{{ asset($d->imagen ? 'imagenes/'.$d->imagen : 'student/main/assets/img/team/UserImg.png') }}"
                             width="50">
                    </td>

                    <td>{{ $d->nombre }}</td>

                    <td>{{ ucfirst($d->tipo) }}</td>

                    <td>
                        {{-- EDITAR --}}
                        <button
                            class="btn btn-warning btn-sm btn-editar"
                            data-id="{{ $d->id }}"
                            data-nombre="{{ $d->nombre }}"
                            data-tipo="{{ $d->tipo }}"
                            data-descripcion="{{ $d->descripcion }}">
                            Editar
                        </button>

                        {{-- ELIMINAR --}}
                        <form action="{{ route('docentepolitica.destroy', $d->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar docente?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

{{-- ================= JAVASCRIPT ================= --}}
@section('js')
<script>
document.querySelectorAll('.btn-editar').forEach(btn => {
    btn.addEventListener('click', function () {

        // Rellenar inputs
        document.getElementById('nombre').value = this.dataset.nombre;
        document.getElementById('tipo').value = this.dataset.tipo;
        document.getElementById('descripcion').value = this.dataset.descripcion ?? '';

        // Cambiar action a UPDATE
        const form = document.getElementById('form-docente');
        form.action = `/docentepolitica/${this.dataset.id}`;

        // Cambiar método a PUT
        document.getElementById('form-method').value = 'PUT';

        // Cambiar texto botón
        document.getElementById('btn-submit').innerText = 'Actualizar';

        // Subir al formulario
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
</script>
@endsection
