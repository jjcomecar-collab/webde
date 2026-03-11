@extends('adminlte::page')

@section('title', 'Cantidades / Estadísticas')

@section('content')

<div class="container mt-4">

    {{-- MENSAJE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- =========================
        FORM CREATE / EDIT
    ========================== --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">
                {{ isset($quantity) ? '✏️ Editar Registro' : '➕ Nuevo Registro' }}
            </h5>
        </div>

        <div class="card-body">
            <form method="POST"
                action="{{ isset($quantity)
                    ? route('quantitie.update', $quantity->id)
                    : route('quantitie.store') }}">

                @csrf
                @isset($quantity)
                    @method('PUT')
                @endisset

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control"
                            value="{{ $quantity->titulo ?? old('titulo') }}"
                            required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Cantidad</label>
                        <input type="number" name="cantidad" class="form-control"
                            value="{{ $quantity->cantidad ?? old('cantidad') }}"
                            required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Icono (FontAwesome)</label>
                        <input type="text" name="icono" class="form-control"
                            placeholder="fa-users"
                            value="{{ $quantity->icono ?? old('icono') }}"
                            required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Duración</label>
                        <input type="number" name="duracion" class="form-control"
                            value="{{ $quantity->duracion ?? 7 }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                            <option value="1"
                                {{ (isset($quantity) && $quantity->estado == 1) ? 'selected' : '' }}>
                                Activo
                            </option>
                            <option value="0"
                                {{ (isset($quantity) && $quantity->estado == 0) ? 'selected' : '' }}>
                                Inactivo
                            </option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-primary">
                    {{ isset($quantity) ? 'Actualizar' : 'Guardar' }}
                </button>

                @isset($quantity)
                    <a href="{{ route('quantitie.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                @endisset
            </form>
        </div>
    </div>

    {{-- =========================
        TABLA
    ========================== --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">📊 Listado</h5>
        </div>

        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Cantidad</th>
                        <th>Icono</th>
                        <th>Duración</th>
                        <th>Estado</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($quantities as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>
                                <i class="fa-solid {{ $item->icono }}"></i>
                                {{ $item->icono }}
                            </td>
                            <td>{{ $item->duracion }}</td>
                            <td>
                                @if($item->estado)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('quantitie.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning">
                                    ✏️
                                </a>

                                <form action="{{ route('quantitie.destroy', $item->id) }}"
                                    method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar registro?')">
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

{{-- =========================
    SCRIPTS
========================== --}}
@push('scripts')

{{-- FontAwesome --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

{{-- DataTables --}}
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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
