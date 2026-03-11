@extends('adminlte::page')

@section('title', 'Docentes Derecho')

@section('content')
<div class="container-fluid">

{{-- FORMULARIO --}}
<div class="card mb-4">
    <div class="card-header">
        <h5>{{ isset($docente) ? 'Editar Docente' : 'Nuevo Docente' }}</h5>
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($docente) ? route('docentederecho.update',$docente->id) : route('docentederecho.store') }}"
              enctype="multipart/form-data">

            @csrf
            @isset($docente) @method('PUT') @endisset

            <div class="row">
                <div class="col-md-4">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control"
                           value="{{ $docente->nombre ?? '' }}" required>
                </div>

                <div class="col-md-4">
                    <label>Tipo</label>
                    <select name="tipo" class="form-control" required>
                        <option value="">-- Seleccionar --</option>
                        <option value="DOCENTES NOMBRADOS"
                            @selected(($docente->tipo ?? '')=='DOCENTES NOMBRADOS')>
                            DOCENTES NOMBRADOS
                        </option>
                        <option value="DOCENTES CONTRATADOS"
                            @selected(($docente->tipo ?? '')=='DOCENTES CONTRATADOS')>
                            DOCENTES CONTRATADOS
                        </option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label>Orden</label>
                    <input type="number" name="orden" class="form-control"
                           value="{{ $docente->orden ?? 0 }}">
                </div>

                <div class="col-md-2">
                    <label>Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>

            <button class="btn btn-primary mt-3">
                {{ isset($docente) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- TABLA --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docentes as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->tipo }}</td>
                    <td>{{ $d->orden }}</td>
                    <td>
                        @if($d->imagen)
                            <img src="{{ asset('imagenes_auditorios/'.$d->imagen) }}" width="60">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('docentederecho.edit',$d->id) }}"
                           class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('docentederecho.destroy',$d->id) }}"
                              method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                              onclick="return confirm('¿Eliminar?')">
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

</div>
@endsection
