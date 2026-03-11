@extends('adminlte::page')

@section('title', 'Departamento')

@section('content')

{{-- FORMULARIO --}}
<div class="card mb-4">
    <div class="card-header">
        {{ $edit ? 'Editar Departamento' : 'Registrar Departamento' }}
    </div>

    <div class="card-body">
        <form
            action="{{ $edit ? route('departamento.update',$edit->id) : route('departamento.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @if($edit) @method('PUT') @endif

            <div class="row">

                <div class="col-md-6">
                    <input type="text" name="titulo_pagina" class="form-control"
                        placeholder="Título página"
                        value="{{ old('titulo_pagina',$edit->titulo_pagina ?? '') }}">
                </div>

                <div class="col-md-6">
                    <input type="text" name="nombre" class="form-control"
                        placeholder="Nombre directora"
                        value="{{ old('nombre',$edit->nombre ?? '') }}">
                </div>

                <div class="col-md-6 mt-2">
                    <input type="file" name="imagen" class="form-control">
                    @if($edit && $edit->imagen)
                        <img src="{{ asset('imagenes/'.$edit->imagen) }}" width="80" class="mt-2">
                    @endif
                </div>

                {{-- FUNCIONES --}}
                <div class="col-md-12 mt-3">
                    <label>Funciones</label>
                    @for($i=0;$i<20;$i++)
                        <input type="text" name="funciones[]" class="form-control mb-1"
                            value="{{ $edit->funciones[$i] ?? '' }}">
                    @endfor
                </div>

                {{-- PLAN --}}
                <div class="col-md-12 mt-3">
                    <input type="text" name="plan_titulo" class="form-control"
                        placeholder="Título del plan"
                        value="{{ old('plan_titulo',$edit->plan_titulo ?? '') }}">
                </div>

                {{-- PLANES --}}
                @for($i=0;$i<4;$i++)
                <div class="col-md-3 mt-2">
                    <input type="text" name="planes[{{ $i }}][titulo]" class="form-control"
                        placeholder="Título"
                        value="{{ $edit->planes[$i]['titulo'] ?? '' }}">
                </div>
                <div class="col-md-3 mt-2">
                    <input type="text" name="planes[{{ $i }}][url]" class="form-control"
                        placeholder="URL"
                        value="{{ $edit->planes[$i]['url'] ?? '' }}">
                </div>
                <div class="col-md-3 mt-2">
                    <input type="text" name="planes[{{ $i }}][icono]" class="form-control"
                        placeholder="Icono"
                        value="{{ $edit->planes[$i]['icono'] ?? 'bi-download' }}">
                </div>
                <div class="col-md-3 mt-2">
                    <input type="color" name="planes[{{ $i }}][color]" class="form-control"
                        value="{{ $edit->planes[$i]['color'] ?? '#000000' }}">
                </div>
                @endfor

                <div class="col-md-2 mt-3">
                    <button class="btn btn-primary w-100">
                        {{ $edit ? 'Actualizar' : 'Guardar' }}
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

{{-- TABLA --}}
<div class="card">
    <div class="card-header">Listado</div>
    <div class="card-body">
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departamentos as $d)
                <tr>
                    <td>
                        @if($d->imagen)
                            <img src="{{ asset('imagenes/'.$d->imagen) }}" width="60">
                        @endif
                    </td>
                    <td>{{ $d->nombre }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('departamento.edit',$d->id) }}"
                           class="btn btn-warning btn-sm">Editar</a>

                        <form method="POST"
                              action="{{ route('departamento.destroy',$d->id) }}">
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
