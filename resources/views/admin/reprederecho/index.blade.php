@extends('adminlte::page')

@section('title', 'Representación Derecho')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <h5>{{ $registro ? 'Editar contenido' : 'Crear contenido' }}</h5>
    </div>

    <div class="card-body">
        <form 
            action="{{ $registro ? route('reprederecho.update', $registro->id) : route('reprederecho.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @if($registro) @method('PUT') @endif

            <div class="form-group">
                <label>Título página</label>
                <input type="text" name="titulo_pagina" class="form-control"
                       value="{{ $registro->titulo_pagina ?? '' }}">
            </div>

            <div class="form-group">
                <label>Imagen</label>
                <input type="file" name="imagen" class="form-control">
      @if($registro && $registro->imagen)
    <img src="{{ asset('imagenes/'.$registro->imagen) }}" class="img-fluid">
@endif


            </div>

            <div class="form-group">
                <label>Inner title</label>
                <input type="text" name="inner_title" class="form-control"
                       value="{{ $registro->inner_title ?? '' }}">
            </div>

            <div class="form-group">
                <label>Año</label>
                <input type="text" name="anio" class="form-control"
                       value="{{ $registro->anio ?? '' }}">
            </div>

            <div class="form-group">
                <label>Subtítulo</label>
                <input type="text" name="subtitulo" class="form-control"
                       value="{{ $registro->subtitulo ?? '' }}">
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3">{{ $registro->descripcion ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label>Lista (una línea por item)</label>
                <textarea name="lista" class="form-control" rows="4">@if($registro && is_array($registro->lista)){{ implode("\n", $registro->lista) }}@endif</textarea>
            </div>

            <div class="form-group">
                <label>Descripción final</label>
                <textarea name="descripcion_final" class="form-control" rows="3">{{ $registro->descripcion_final ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label>URL Video</label>
                <input type="text" name="video_url" class="form-control"
                       value="{{ $registro->video_url ?? '' }}">
            </div>

            <button class="btn btn-primary">
                {{ $registro ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Registros</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo_pagina }}</td>
                    <td>
                      @if($item->imagen)
    <img src="{{ asset('imagenes/'.$item->imagen) }}" class="img-fluid">
@endif

                    </td>
                    <td>
                        <form action="{{ route('reprederecho.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
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
