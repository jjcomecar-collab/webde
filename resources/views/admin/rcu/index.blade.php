@extends('adminlte::page')

@section('content')

<div class="container">

    {{-- FORMULARIO CREATE / EDIT --}}
    <div class="card mb-4">
        <div class="card-header">
            {{ isset($rcu) ? 'Editar RCU' : 'Nueva RCU' }}
        </div>

        <div class="card-body">
            <form 
                action="{{ isset($rcu) ? route('rcu.update',$rcu->id) : route('rcu.store') }}"
                method="POST">

                @csrf
                @isset($rcu)
                    @method('PUT')
                @endisset

                <div class="mb-3">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control"
                        value="{{ $rcu->title ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $rcu->description ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Link de descarga</label>
                    <input type="url" name="download_link" class="form-control"
                        value="{{ $rcu->download_link ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label>Icono (Bootstrap Icons)</label>
                    <input type="text" name="icon" class="form-control"
                        value="{{ $rcu->icon ?? 'bi bi-download' }}">
                </div>

                <button class="btn btn-primary">
                    {{ isset($rcu) ? 'Actualizar' : 'Guardar' }}
                </button>
            </form>
        </div>
    </div>

    {{-- TABLA --}}
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Link</th>
                        <th>Icono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rcus as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ $item->download_link }}" target="_blank">
                                    Ver archivo
                                </a>
                            </td>
                            <td>
                                <i class="{{ $item->icon }}"></i>
                            </td>
                            <td>
                                <a href="{{ route('rcu.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">
                                   Editar
                                </a>

                                <form action="{{ route('rcu.destroy',$item->id) }}"
                                      method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar RCU?')">
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
