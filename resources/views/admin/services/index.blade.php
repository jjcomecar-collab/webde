@extends('adminlte::page')

@section('title', 'Services')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{ isset($service) ? 'Editar Servicio' : 'Crear Servicio' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($service)
                ? route('admin.services.update', ['modulo'=>$modulo,'service'=>$service->id])
                : route('admin.services.store', ['modulo'=>$modulo]) }}">
            @csrf
            @isset($service) @method('PUT') @endisset

            <input type="text" name="titulo" class="form-control mb-2"
                   placeholder="Titulo" value="{{ $service->titulo ?? '' }}">

            <textarea name="descripcion" class="form-control mb-2"
                placeholder="Descripcion">{{ $service->descripcion ?? '' }}</textarea>

            <input type="text" name="icono" class="form-control mb-2"
                   placeholder="Icono" value="{{ $service->icono ?? '' }}">

            <input type="text" name="color" class="form-control mb-2"
                   placeholder="Color" value="{{ $service->color ?? '' }}">

            <button class="btn btn-primary">
                {{ isset($service) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit',[
                            'modulo'=>$modulo,'service'=>$item->id
                        ]) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('admin.services.destroy',[
                            'modulo'=>$modulo,'service'=>$item->id
                        ]) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
