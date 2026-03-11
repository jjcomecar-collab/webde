@extends('adminlte::page')

@section('title', 'Runauto')

@section('content')

<div class="container">

    <h4 class="mb-4">Marquee RunAuto</h4>

    {{-- ALERTA --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ===================== --}}
    {{-- FORM CREATE / EDIT --}}
    {{-- ===================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>
                {{ isset($editRunauto) ? 'Editar Logo' : 'Nuevo Logo' }}
            </strong>
        </div>

        <div class="card-body">
            <form
                action="{{ isset($editRunauto)
                    ? route('runauto.update', $editRunauto)
                    : route('runauto.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @isset($editRunauto)
                    @method('PUT')
                @endisset

                <div class="row">

                    {{-- NOMBRE --}}
                    <div class="col-md-3 mb-2">
                        <label>Nombre</label>
                        <input type="text"
                            name="nombre"
                            class="form-control"
                            value="{{ $editRunauto->nombre ?? '' }}">
                    </div>

                    {{-- IMAGEN --}}
                    <div class="col-md-4 mb-2">
                        <label>Imagen</label>
                        <input type="file"
                            name="imagen"
                            class="form-control"
                            accept="image/*"
                            {{ isset($editRunauto) ? '' : 'required' }}>

                        @isset($editRunauto)
                            <small class="text-muted">Imagen actual:</small><br>
                            <img src="{{ asset($editRunauto->imagen) }}"
                                width="80"
                                class="mt-1">
                        @endisset
                    </div>

                    {{-- ORDEN --}}
                    <div class="col-md-2 mb-2">
                        <label>Orden</label>
                        <input type="number"
                            name="orden"
                            class="form-control"
                            value="{{ $editRunauto->orden ?? 0 }}">
                    </div>

                    {{-- ESTADO OCULTO --}}
                    <input type="hidden" name="estado" value="1">

                    {{-- BOTÓN --}}
                    <div class="col-md-1 d-flex align-items-end">
                        <button class="btn {{ isset($editRunauto) ? 'btn-warning' : 'btn-success' }} w-100">
                            {{ isset($editRunauto) ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    {{-- ===================== --}}
    {{-- TABLA INDEX --}}
    {{-- ===================== --}}
    <div class="card">
        <div class="card-header">
            <strong>Listado de Logos</strong>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover align-middle" id="datatable">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Orden</th>
                        <th>Estado</th>
                        <th width="160">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($runautos as $item)
                        <tr class="{{ isset($editRunauto) && $editRunauto->id == $item->id ? 'table-warning' : '' }}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>
                                <img src="{{ asset($item->imagen) }}" width="70">
                            </td>
                            <td>{{ $item->orden }}</td>
                            <td>
                                <span class="badge {{ $item->estado ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('runauto.edit', $item) }}"
                                   class="btn btn-sm btn-warning">
                                    Editar
                                </a>

                                <form action="{{ route('runauto.destroy', $item) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
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
