@extends('adminlte::page')

@section('title','Servicios')

@section('content_header')
<h1>Gestión de Servicios</h1>
@endsection

@section('content')

{{-- FORM --}}
<div class="card mb-4">
    <div class="card-header {{ isset($edit) ? 'bg-warning' : 'bg-primary' }} text-white">
        {{ isset($edit) ? 'Editar Servicio' : 'Nuevo Servicio' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($edit) ? route('cepejupservices.update',$edit->id) : route('cepejupservices.store') }}">
            @csrf
            @isset($edit) @method('PUT') @endisset

            <input type="text" name="titulo" class="form-control mb-2"
                   value="{{ $edit->titulo ?? '' }}" placeholder="Título" required>

            <textarea name="descripcion" class="form-control mb-2"
                      placeholder="Descripción">{{ $edit->descripcion ?? '' }}</textarea>

            <input type="text" name="icono" class="form-control mb-2"
                   value="{{ $edit->icono ?? '' }}" placeholder="Icono (bi bi-activity)">

            <input type="text" name="color" class="form-control mb-2"
                   value="{{ $edit->color ?? '' }}" placeholder="Clase color (item-cyan)">

            <textarea name="svg" class="form-control mb-3"
                      placeholder="SVG">{{ $edit->svg ?? '' }}</textarea>

            <button class="btn btn-success">
                {{ isset($edit) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Icono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td><i class="{{ $item->icono }}"></i></td>
                    <td>
                        <a href="{{ route('cepejupservices.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('cepejupservices.destroy',$item->id) }}"
                              method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
