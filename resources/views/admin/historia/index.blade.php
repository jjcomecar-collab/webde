@extends('adminlte::page')

@section('title', 'Historia')

@section('content_header')
    <h1>Historia - Facultad</h1>
@stop

@section('content')

{{-- FORMULARIO --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        {{ isset($historia) ? 'Editar Historia' : 'Nueva Historia' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($historia) ? route('historia.update',$historia->id) : route('historia.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($historia))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ $historia->title ?? '' }}" required>
                </div>

                <div class="col-md-6">
                    <label>Subtítulo</label>
                    <input type="text" name="subtitle" class="form-control"
                           value="{{ $historia->subtitle ?? '' }}">
                </div>
            </div>

            <div class="mt-3">
                <label>Imagen</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mt-3">
                <label>Párrafo 1</label>
                <textarea name="paragraph_1" class="form-control" rows="3" required>
{{ $historia->paragraph_1 ?? '' }}</textarea>
            </div>

            <div class="mt-3">
                <label>Párrafo 2</label>
                <textarea name="paragraph_2" class="form-control" rows="3">
{{ $historia->paragraph_2 ?? '' }}</textarea>
            </div>

            <div class="mt-3">
                <label>Párrafo 3</label>
                <textarea name="paragraph_3" class="form-control" rows="3">
{{ $historia->paragraph_3 ?? '' }}</textarea>
            </div>

            <button class="btn btn-success mt-3">
                {{ isset($historia) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- TABLA --}}
<div class="card">
    <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historias as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('imagenes_historias/'.$item->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('historia.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('historia.destroy',$item->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
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

@stop

@section('js')
<script>
    $('#tabla').DataTable();
</script>
@stop
