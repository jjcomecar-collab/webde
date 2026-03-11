@extends('adminlte::page')

@section('content')

<div class="container-fluid">

    {{-- MENSAJE SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- =======================
        FORMULARIO CREATE / EDIT
    ======================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">
                {{ isset($horario) ? '✏️ Editar Horario' : '➕ Nuevo Horario' }}
            </h5>
        </div>

        <div class="card-body">
            <form method="POST"
                action="{{ isset($horario) ? route('horario.update',$horario->id) : route('horario.store') }}">
                @csrf
                @if(isset($horario))
                    @method('PUT')
                @endif

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Título</label>
                        <input type="text"
                               name="titulo"
                               class="form-control"
                               value="{{ old('titulo', $horario->titulo ?? '') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text"
                               name="descripcion"
                               class="form-control"
                               value="{{ old('descripcion', $horario->descripcion ?? '') }}"
                               required>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label">URL</label>
                        <input type="url"
                               name="url"
                               class="form-control"
                               value="{{ old('url', $horario->url ?? '') }}"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Color del ícono</label>
                        <input type="color"
                               name="color_icono"
                               class="form-control form-control-color"
                               value="{{ old('color_icono', $horario->color_icono ?? '#000000') }}">
                    </div>

                </div>

                <button class="btn btn-primary">
                    {{ isset($horario) ? 'Actualizar' : 'Guardar' }}
                </button>

                @if(isset($horario))
                    <a href="{{ route('horario.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                @endif
            </form>
        </div>
    </div>

    {{-- =======================
        TABLA LISTADO
    ======================== --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">📋 Listado de Horarios</h5>
        </div>

        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">#</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>URL</th>
                        <th width="140">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($horarios as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>
                                <a href="{{ $item->url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    Ver
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('horario.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    ✏️
                                </a>

                                <form action="{{ route('horario.destroy',$item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este horario?')">
                                        🗑️
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

{{-- =======================
    DATATABLE SCRIPT
======================== --}}
@push('scripts')
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>
@endpush
