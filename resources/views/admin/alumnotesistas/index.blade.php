@extends('adminlte::page')

@section('title', 'Alumnos Tesistas')

@section('content')

{{-- ================= FORMULARIO ================= --}}
<div class="card mb-4">
    <div class="card-header">
        <h5>{{ isset($edit) ? 'Editar Tesista' : 'Nuevo Tesista' }}</h5>
    </div>

    <div class="card-body">
        <form
            action="{{ isset($edit)
                ? route('admin.alumnotesistas.update', [$modulo, $edit->id])
                : route('admin.alumnotesistas.store', $modulo) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @isset($edit)
                @method('PUT')
            @endisset

            <input type="hidden" name="estado" value="1">

            <div class="row">
                <div class="col-md-3">
                    <label>Nombres</label>
                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="{{ old('nombre', $edit->nombre ?? '') }}">
                </div>

                <div class="col-md-3">
                    <label>Título</label>
                    <input type="text"
                           name="titulo"
                           class="form-control"
                           value="{{ old('titulo', $edit->titulo ?? '') }}">
                </div>

                <div class="col-md-3">
                    <label>Fecha</label>
                    <input type="date"
                           name="fecha"
                           class="form-control"
                           value="{{ old('fecha', $edit->fecha ?? '') }}">
                </div>

                <div class="col-md-3">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">

                    @isset($edit)
                        @if($edit->foto)
                            <img src="{{ asset('imagenes/'.$edit->foto) }}"
                                 width="80"
                                 class="mt-2">
                        @endif
                    @endisset
                </div>
            </div>

            <div class="mt-3">
                <button class="btn {{ isset($edit) ? 'btn-warning' : 'btn-primary' }}">
                    {{ isset($edit) ? 'Actualizar' : 'Guardar' }}
                </button>

                @isset($edit)
                    <a href="{{ route('admin.alumnotesistas.index', $modulo) }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>
                @endisset
            </div>
        </form>
    </div>
</div>

{{-- ================= TABLA ================= --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Foto</th>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $key => $item)
                <tr class="{{ isset($edit) && $edit->id == $item->id ? 'table-warning' : '' }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('imagenes/'.$item->foto) }}" width="60">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>
    @if($item->estado == 1)
        <span class="badge badge-success">Activo</span>
    @else
        <span class="badge badge-danger">Eliminado</span>
    @endif
</td>

                <td class="d-flex gap-1">

    {{-- EDITAR SOLO SI ESTA ACTIVO --}}
    @if($item->estado == 1)
        <a href="{{ route('admin.alumnotesistas.edit', [$modulo, $item->id]) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>
    @endif

    {{-- ELIMINAR --}}
    @if($item->estado == 1)
        <form action="{{ route('admin.alumnotesistas.destroy', [$modulo, $item->id]) }}"
              method="POST"
              onsubmit="return confirm('¿Eliminar?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                Eliminar
            </button>
        </form>
    @else
        {{-- RESTAURAR --}}
        <form action="{{ route('admin.alumnotesistas.restore', [$modulo, $item->id]) }}"
              method="POST">
            @csrf
            @method('PUT')
            <button class="btn btn-success btn-sm">
                Restaurar
            </button>
        </form>
    @endif

</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
