@extends('adminlte::page')

@section('title','Decano')

@section('content')
<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FORM CREATE / EDIT --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5>{{ isset($decano) ? '✏️ Editar Decano' : '➕ Nuevo Decano' }}</h5>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                action="{{ isset($decano) ? route('decano.update',$decano->id) : route('decano.store') }}">
                
                @csrf
                @isset($decano)
                    @method('PUT')
                @endisset

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Cargo</label>
                        <input type="text" name="cargo" class="form-control"
                            value="{{ $decano->cargo ?? '' }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                            value="{{ $decano->nombre ?? '' }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Imagen</label>
                        <input type="file" name="imagen" class="form-control"
                            {{ isset($decano) ? '' : 'required' }}>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Orden</label>
                        <input type="number" name="orden" class="form-control"
                            value="{{ $decano->orden ?? 0 }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                            <option value="1" {{ isset($decano) && $decano->estado==1 ? 'selected':'' }}>Activo</option>
                            <option value="0" {{ isset($decano) && $decano->estado==0 ? 'selected':'' }}>Inactivo</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary">
                    {{ isset($decano) ? 'Actualizar' : 'Guardar' }}
                </button>

                @isset($decano)
                    <a href="{{ route('decano.index') }}" class="btn btn-secondary">Cancelar</a>
                @endisset
            </form>
        </div>
    </div>

    {{-- TABLA --}}
    <div class="card">
        <div class="card-header">
            <h5>📋 Listado</h5>
        </div>

        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cargo</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Orden</th>
                        <th>Estado</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($decanos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->cargo }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>
                                <img src="{{ asset('imagenes_decano/'.$item->imagen) }}"
                                    width="70">
                            </td>
                            <td>{{ $item->orden }}</td>
                            <td>
                                {!! $item->estado
                                    ? '<span class="badge bg-success">Activo</span>'
                                    : '<span class="badge bg-danger">Inactivo</span>' !!}
                            </td>
                            <td>
                                <a href="{{ route('decano.edit',$item->id) }}"
                                    class="btn btn-sm btn-warning">✏️</a>

                                <form method="POST"
                                    action="{{ route('decano.destroy',$item->id) }}"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar?')">🗑️</button>
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
