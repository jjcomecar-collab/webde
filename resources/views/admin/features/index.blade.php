@extends('adminlte::page')

@section('title', 'Features')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{ isset($feature) ? 'Editar Feature' : 'Crear Feature' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($feature)
                ? route('admin.features.update', ['modulo'=>$modulo,'feature'=>$feature->id])
                : route('admin.features.store', ['modulo'=>$modulo]) }}">
            @csrf
            @isset($feature) @method('PUT') @endisset

            <input type="text" name="titulo" class="form-control mb-2"
                   placeholder="Titulo" value="{{ $feature->titulo ?? '' }}">

            <input type="text" name="url" class="form-control mb-2"
                   placeholder="URL" value="{{ $feature->url ?? '' }}">

            <input type="text" name="icono" class="form-control mb-2"
                   placeholder="Icono" value="{{ $feature->icono ?? '' }}">

            <input type="text" name="color" class="form-control mb-2"
                   placeholder="Color" value="{{ $feature->color ?? '' }}">

            <button class="btn btn-primary">
                {{ isset($feature) ? 'Actualizar' : 'Guardar' }}
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
                @foreach($features as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>
                        <a href="{{ route('admin.features.edit',[
                            'modulo'=>$modulo,'feature'=>$item->id
                        ]) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('admin.features.destroy',[
                            'modulo'=>$modulo,'feature'=>$item->id
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
