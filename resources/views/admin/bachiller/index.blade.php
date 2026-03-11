@extends('adminlte::page')

@section('title', 'Bachiller')

@section('content')
<div class="container-fluid">

    {{-- FORM CREATE / EDIT --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                {{ $edit ? 'Editar Bachiller' : 'Nuevo Bachiller' }}
            </h3>
        </div>

        <form method="POST"
              action="{{ $edit ? route('bachiller.update', $edit->id) : route('bachiller.store') }}">
            @csrf
            @if($edit)
                @method('PUT')
            @endif

            <div class="card-body row">
                <div class="col-md-4">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control"
                           value="{{ $edit->titulo ?? '' }}" required>
                </div>

                <div class="col-md-4">
                    <label>Descripción</label>
                    <input type="text" name="descripcion" class="form-control"
                           value="{{ $edit->descripcion ?? '' }}" required>
                </div>

                <div class="col-md-2">
                    <label>Icono (Bootstrap)</label>
                    <input type="text" name="icono" class="form-control"
                           value="{{ $edit->icono ?? 'bi-eye' }}" required>
                </div>

                <div class="col-md-2">
                    <label>Color</label>
                    <input type="color" name="color" class="form-control"
                           value="{{ $edit->color ?? '#ffbb2c' }}">
                </div>

                <div class="col-md-12 mt-3">
                    <label>URL</label>
                    <input type="url" name="url" class="form-control"
                           value="{{ $edit->url ?? '' }}" required>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">
                    {{ $edit ? 'Actualizar' : 'Guardar' }}
                </button>

                @if($edit)
                    <a href="{{ route('bachiller.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- TABLA --}}
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Listado Bachiller</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripcion</th>
                        <th>URL</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bachillers as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>
                                <a href="{{ $item->url }}" target="_blank">Ver</a>
                            </td>
                            <td>
                                <a href="{{ route('bachiller.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('bachiller.destroy', $item->id) }}"
                                      method="POST"
                                      style="display:inline-block">
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

</div>
@endsection
