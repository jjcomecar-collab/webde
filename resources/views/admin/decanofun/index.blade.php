@extends('adminlte::page')

@section('title', 'Decano')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{ $editar ? 'Editar Decano' : 'Registrar Decano' }}
    </div>

    <div class="card-body">
        <form action="{{ $editar ? route('decanofun.update', $editar->id) : route('decanofun.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @if($editar)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4">
                    <input type="text"
                           name="titulo_pagina"
                           class="form-control"
                           placeholder="Título página"
                           value="{{ old('titulo_pagina', $editar->titulo_pagina ?? '') }}">
                </div>

                <div class="col-md-4">
                    <input type="text"
                           name="nombre"
                           class="form-control"
                           placeholder="Nombre del decano"
                           value="{{ old('nombre', $editar->nombre ?? '') }}">
                </div>

                <div class="col-md-4">
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>

            <hr>

            <h6>Funciones</h6>
            <div id="funciones">
                @php
                    $funciones = old('funciones', $editar->funciones ?? ['']);
                @endphp

                @foreach($funciones as $f)
                    <input type="text" name="funciones[]" class="form-control mb-2" value="{{ $f }}">
                @endforeach
            </div>

            <button type="button" class="btn btn-secondary btn-sm mb-3" onclick="agregarFuncion()">
                + Agregar función
            </button>

            <div>
                <button class="btn btn-primary">
                    {{ $editar ? 'Actualizar' : 'Guardar' }}
                </button>

                @if($editar)
                    <a href="{{ route('decanofun.index') }}" class="btn btn-warning">
                        Cancelar
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">Listado</div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($registros as $r)
                <tr>
                    <td>
                        @if($r->imagen)
                            <img src="{{ asset('imagenes/'.$r->imagen) }}" width="60">
                        @endif
                    </td>
                    <td>{{ $r->titulo_pagina }}</td>
                    <td>{{ $r->nombre }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('decanofun.edit', $r->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('decanofun.destroy', $r->id) }}" method="POST">
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
function agregarFuncion() {
    let div = document.getElementById('funciones');
    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'funciones[]';
    input.className = 'form-control mb-2';
    div.appendChild(input);
}
</script>
@endsection
