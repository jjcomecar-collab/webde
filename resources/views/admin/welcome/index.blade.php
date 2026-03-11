@extends('adminlte::page')

@section('title', 'Welcome')


@section('content')
<div class="container">

    <h3 class="mb-3">Bienvenidos - Administración</h3>

    {{-- ALERTA --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FORM CREATE --}}
    <div class="card mb-4">
        <div class="card-header">Nueva Bienvenida</div>
        <div class="card-body">
            <form action="{{ route('welcome.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Descripción</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <button class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <table class="table table-bordered" id="datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Estado</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($welcomes as $welcome)
            <tr>
                <td>{{ $welcome->id }}</td>
                <td>{{ $welcome->title }}</td>
                <td>
                    {!! $welcome->estado
                        ? '<span class="badge bg-success">Activo</span>'
                        : '<span class="badge bg-danger">Inactivo</span>' !!}
                </td>
                <td>
                    {{-- EDIT --}}
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $welcome->id }}">
                        Editar
                    </button>

                    {{-- DELETE --}}
                    <form action="{{ route('welcome.destroy', $welcome) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Eliminar registro?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>

            {{-- MODAL EDIT --}}
            <div class="modal fade" id="edit{{ $welcome->id }}">
                <div class="modal-dialog">
                    <form action="{{ route('welcome.update', $welcome) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Editar Bienvenida</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-2">
                                    <label>Título</label>
                                    <input type="text" name="title" class="form-control"
                                           value="{{ $welcome->title }}" required>
                                </div>

                                <div class="mb-2">
                                    <label>Descripción</label>
                                    <textarea name="description" class="form-control" rows="3" required>{{ $welcome->description }}</textarea>
                                </div>

                                <div class="mb-2">
                                    <label>Estado</label>
                                    <select name="estado" class="form-control">
                                        <option value="1" {{ $welcome->estado ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ !$welcome->estado ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#datatable').DataTable();
});
</script>
@endpush
