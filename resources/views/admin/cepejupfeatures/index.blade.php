@extends('adminlte::page')

@section('title','Features')

@section('content_header')
<h1>Gestión de Features</h1>
@endsection

@section('content')

{{-- FORM --}}
<div class="card mb-4">
    <div class="card-header {{ isset($edit) ? 'bg-warning' : 'bg-primary' }} text-white">
        {{ isset($edit) ? 'Editar Feature' : 'Nuevo Feature' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($edit) ? route('cepejupfeatures.update',$edit->id) : route('cepejupfeatures.store') }}">
            @csrf
            @isset($edit) @method('PUT') @endisset

            <input type="text" name="titulo" class="form-control mb-2"
                   value="{{ $edit->titulo ?? '' }}" placeholder="Título" required>

            <input type="text" name="url" class="form-control mb-2"
                   value="{{ $edit->url ?? '' }}" placeholder="URL">

            <input type="text" name="icono" class="form-control mb-2"
                   value="{{ $edit->icono ?? '' }}" placeholder="Icono">

            <input type="text" name="color" class="form-control mb-3"
                   value="{{ $edit->color ?? '' }}" placeholder="Color">

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
                    <th>URL</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($features as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->url }}</td>
                    <td>
                        <a href="{{ route('cepejupfeatures.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('cepejupfeatures.destroy',$item->id) }}"
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
