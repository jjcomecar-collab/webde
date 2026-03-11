@extends('adminlte::page')

@section('content')

<div class="container">

    {{-- FORMULARIO CREATE / EDIT --}}
    <div class="card mb-4">
        <div class="card-header">
            {{ isset($auditorio) ? 'Editar Auditorio' : 'Nuevo Auditorio' }}
        </div>

        <div class="card-body">
            <form 
                action="{{ isset($auditorio) ? route('auditorio.update',$auditorio->id) : route('auditorio.store') }}"
                method="POST" 
                enctype="multipart/form-data">

                @csrf
                @isset($auditorio)
                    @method('PUT')
                @endisset

                <div class="mb-3">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control"
                        value="{{ $auditorio->title ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label>Imagen</label>
                    <input type="file" name="image" class="form-control"
                        {{ isset($auditorio) ? '' : 'required' }}>
                </div>

                @isset($auditorio)
                    <img src="{{ asset($auditorio->image) }}" width="120">
                @endisset

                <button class="btn btn-primary mt-3">
                    {{ isset($auditorio) ? 'Actualizar' : 'Guardar' }}
                </button>
            </form>
        </div>
    </div>

    {{-- TABLA --}}
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($auditorios as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" width="80">
                            </td>
                            <td>
                                <a href="{{ route('auditorio.edit',$item->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('auditorio.destroy',$item->id) }}"
                                      method="POST" style="display:inline">
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
