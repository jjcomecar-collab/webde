@extends('adminlte::page')

@section('title', 'Service Details')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{ isset($service_detail) ? 'Editar Detalle' : 'Crear Detalle' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($service_detail)
                ? route('admin.service-details.update', ['modulo'=>$modulo,'service_detail'=>$service_detail->id])
                : route('admin.service-details.store', ['modulo'=>$modulo]) }}"
              enctype="multipart/form-data">
            @csrf
            @isset($service_detail) @method('PUT') @endisset

            <input type="text" name="titulo" class="form-control mb-2"
                   placeholder="Titulo" value="{{ $service_detail->titulo ?? '' }}">

            <input type="file" name="imagen" class="form-control mb-2">

            <input type="text" name="menu" class="form-control mb-2"
                   placeholder="menu1,menu2"
                   value="{{ isset($service_detail) ? implode(',',$service_detail->menu ?? []) : '' }}">

            <textarea name="descripcion" class="form-control mb-2"
                placeholder="Descripcion">{{ $service_detail->descripcion ?? '' }}</textarea>

            <input type="text" name="lista" class="form-control mb-2"
                   placeholder="item1,item2"
                   value="{{ isset($service_detail) ? implode(',',$service_detail->lista ?? []) : '' }}">

            <textarea name="contenido_1" class="form-control mb-2"
                placeholder="Contenido 1">{{ $service_detail->contenido_1 ?? '' }}</textarea>

            <textarea name="contenido_2" class="form-control mb-2"
                placeholder="Contenido 2">{{ $service_detail->contenido_2 ?? '' }}</textarea>

            <button class="btn btn-primary">
                {{ isset($service_detail) ? 'Actualizar' : 'Guardar' }}
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
                @foreach($details as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>
                        <a href="{{ route('admin.service-details.edit',[
                            'modulo'=>$modulo,'service_detail'=>$item->id
                        ]) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('admin.service-details.destroy',[
                            'modulo'=>$modulo,'service_detail'=>$item->id
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
