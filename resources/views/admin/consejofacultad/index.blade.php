@extends('adminlte::page')

@section('title', 'Consejo Facultad')

@section('content')

<h4>{{ $edit ? 'Editar Registro' : 'Nuevo Registro' }}</h4>

<form action="{{ $edit ? route('consejofacultad.update',$edit->id) : route('consejofacultad.store') }}"
      method="POST" enctype="multipart/form-data">

    @csrf
    @if($edit) @method('PUT') @endif

    <div class="row">
        <div class="col-md-6">
            <label>Título</label>
            <input type="text" name="about_titulo" class="form-control"
                   value="{{ $edit->about_titulo ?? '' }}">
        </div>

        <div class="col-md-6">
            <label>Año</label>
            <input type="text" name="about_anio" class="form-control"
                   value="{{ $edit->about_anio ?? '' }}">
        </div>

        <div class="col-md-12 mt-2">
            <label>Descripción</label>
            <textarea name="about_descripcion" class="form-control">{{ $edit->about_descripcion ?? '' }}</textarea>
        </div>

        <div class="col-md-6 mt-2">
            <label>Imagen About</label>
            <input type="file" name="about_imagen" class="form-control">
            @if($edit && $edit->about_imagen)
                <img src="{{ asset('imagenes/'.$edit->about_imagen) }}" width="80">
            @endif
        </div>

        <div class="col-md-6 mt-2">
            <label>Imagen Detalle</label>
            <input type="file" name="detalle_imagen" class="form-control">
            @if($edit && $edit->detalle_imagen)
                <img src="{{ asset('imagenes/'.$edit->detalle_imagen) }}" width="80">
            @endif
        </div>
    </div>

    <button class="btn btn-primary mt-3">
        {{ $edit ? 'Actualizar' : 'Guardar' }}
    </button>
</form>

<hr>

<table class="table table-bordered table-striped" id="datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Imagen</th>
            <th width="120">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->about_titulo }}</td>
            <td>
                @if($item->about_imagen)
                    <img src="{{ asset('imagenes/'.$item->about_imagen) }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('consejofacultad.edit',$item->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('consejofacultad.destroy',$item->id) }}"
                      method="POST" style="display:inline">
                    @csrf @method('DELETE')
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

@endsection
