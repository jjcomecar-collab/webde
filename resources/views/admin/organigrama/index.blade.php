@extends('adminlte::page')

@section('title', 'Organigrama')

@section('content_header')
    <h1>Organigrama</h1>
@endsection

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- FORMULARIO --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        {{ isset($organigrama) ? 'Editar Organigrama' : 'Nuevo Organigrama' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($organigrama) ? route('organigrama.update',$organigrama->id) : route('organigrama.store') }}"
              enctype="multipart/form-data">

            @csrf
            @if(isset($organigrama))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label>Título</label>
                <input type="text" name="title" class="form-control"
                       value="{{ $organigrama->title ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label>Imagen</label>
                <input type="file" name="image" class="form-control"
                       {{ isset($organigrama) ? '' : 'required' }}>
            </div>

            @if(isset($organigrama))
                <img src="{{ asset('imagenes_organigramas/'.$organigrama->image) }}"
                     width="200" class="mb-3 rounded shadow">
            @endif

            <button class="btn btn-success">
                {{ isset($organigrama) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- TABLA --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th width="150">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organigramas as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <img src="{{ asset('imagenes_organigramas/'.$item->image) }}"
                             width="80" class="rounded">
                    </td>
                    <td>
                        <a href="{{ route('organigrama.edit',$item->id) }}"
                           class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('organigrama.destroy',$item->id) }}"
                              method="POST" class="d-inline">
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

@endsection
