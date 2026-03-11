@extends('adminlte::page')

@section('title', 'Trámites y Costos')

@section('content_header')
    <h1>Trámites y Costos</h1>
@endsection

@section('content')

{{-- FORMULARIO CREATE / EDIT --}}
<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">{{ isset($edit) ? 'Editar' : 'Nuevo' }}</h3>
    </div>

    <div class="card-body">
        <form 
            action="{{ isset($edit) ? route('tramitecosto.update',$edit->id) : route('tramitecosto.store') }}" 
            method="POST" 
            enctype="multipart/form-data"
        >
            @csrf
            @isset($edit)
                @method('PUT')
            @endisset

            <div class="row">
                <div class="col-md-3">
                    <label>Sección</label>
                    <input type="text" name="section" class="form-control" value="{{ $edit->section ?? '' }}">
                </div>

                <div class="col-md-3">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" value="{{ $edit->title ?? '' }}">
                </div>

                <div class="col-md-3">
                    <label>Subtítulo</label>
                    <input type="text" name="subtitle" class="form-control" value="{{ $edit->subtitle ?? '' }}">
                </div>

                <div class="col-md-3">
                    <label>Orden</label>
                    <input type="number" name="order" class="form-control" value="{{ $edit->order ?? 0 }}">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Imagen / Ícono</label>
                    <input type="file" name="icon" class="form-control">
                    @isset($edit->icon)
                        <img src="{{ asset($edit->icon) }}" class="img-fluid mt-2" width="80">
                    @endisset
                </div>

                <div class="col-md-4">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $edit->link ?? '' }}">
                </div>

                <div class="col-md-4">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control" value="{{ $edit->color ?? '' }}">
                </div>
            </div>

            <div class="mt-3">
                <label>Descripción</label>
                <textarea name="description" class="form-control">{{ $edit->description ?? '' }}</textarea>
            </div>

            <button class="btn btn-success mt-3">
                {{ isset($edit) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- TABLA --}}
<div class="card mt-4">
    <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sección</th>
                    <th>Título</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->section }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->order }}</td>
                    <td>
                        <a href="{{ route('tramitecosto.edit',$item->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('tramitecosto.destroy',$item->id) }}" method="POST" class="d-inline">
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
    $('#tabla').DataTable();
</script>
@endsection
