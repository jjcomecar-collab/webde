@extends('adminlte::page')

@section('title', 'POI')

@section('content_header')
    <h1>POI</h1>
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- FORMULARIO CREATE / EDIT --}}
<div class="card mb-4">
    <div class="card-header">
        <strong>{{ isset($poi) ? 'Editar POI' : 'Nuevo POI' }}</strong>
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($poi) ? route('poi.update',$poi->id) : route('poi.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($poi)) @method('PUT') @endif

            <div class="row">

                <div class="col-md-6">
                    <label>Menú (uno por línea)</label>
                    <textarea name="menu" class="form-control" rows="5">{{ isset($poi) ? implode("\n",$poi->menu ?? []) : '' }}</textarea>
                </div>

                <div class="col-md-6">
                    <label>Subtítulo</label>
                    <input type="text" name="subtitulo" class="form-control"
                           value="{{ $poi->subtitulo ?? '' }}">
                </div>

                <div class="col-md-12 mt-2">
                    <label>Descripción corta</label>
                    <textarea name="descripcion_corta" class="form-control">{{ $poi->descripcion_corta ?? '' }}</textarea>
                </div>

                <div class="col-md-6 mt-2">
                    <label>Título principal</label>
                    <input type="text" name="titulo_principal" class="form-control"
                           value="{{ $poi->titulo_principal ?? '' }}">
                </div>

                <div class="col-md-6 mt-2">
                    <label>Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                    @isset($poi->imagen)
                        <img src="{{ asset('imagenes/'.$poi->imagen) }}" width="120" class="mt-2">
                    @endisset
                </div>

                <div class="col-md-12 mt-2">
                    <label>Párrafo 1</label>
                    <textarea name="parrafo_1" class="form-control">{{ $poi->parrafo_1 ?? '' }}</textarea>
                </div>

                <div class="col-md-6 mt-2">
                    <label>Lista (uno por línea)</label>
                    <textarea name="lista" class="form-control" rows="4">{{ isset($poi) ? implode("\n",$poi->lista ?? []) : '' }}</textarea>
                </div>

                <div class="col-md-6 mt-2">
                    <label>Párrafo 2</label>
                    <textarea name="parrafo_2" class="form-control">{{ $poi->parrafo_2 ?? '' }}</textarea>
                </div>

                <div class="col-md-12 mt-2">
                    <label>Párrafo 3</label>
                    <textarea name="parrafo_3" class="form-control">{{ $poi->parrafo_3 ?? '' }}</textarea>
                </div>

            </div>

            <button class="btn btn-primary mt-3">
                {{ isset($poi) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- TABLA --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped" id="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pois as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo_principal }}</td>
                    <td>
                        @if($item->imagen)
                            <img src="{{ asset('imagenes/'.$item->imagen) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('poi.edit',$item->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('poi.destroy',$item->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
