@extends('adminlte::page')

@section('title', 'Línea Institucional')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <h4>{{ isset($linea) ? 'Editar' : 'Crear' }} Línea</h4>
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($linea) ? route('linea.update',$linea->id) : route('linea.store') }}"
              enctype="multipart/form-data">

            @csrf
            @if(isset($linea)) @method('PUT') @endif

            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="about_titulo" class="form-control mb-2"
                           placeholder="Título"
                           value="{{ $linea->about_titulo ?? '' }}">
                </div>

                <div class="col-md-6">
                    <input type="text" name="about_subtitulo" class="form-control mb-2"
                           placeholder="Subtítulo"
                           value="{{ $linea->about_subtitulo ?? '' }}">
                </div>

                <div class="col-md-4">
                    <input type="text" name="about_anio" class="form-control mb-2"
                           placeholder="Año"
                           value="{{ $linea->about_anio ?? '' }}">
                </div>

                <div class="col-md-8">
                    <input type="text" name="about_video_url" class="form-control mb-2"
                           placeholder="URL Video"
                           value="{{ $linea->about_video_url ?? '' }}">
                </div>

                <div class="col-md-12">
                    <textarea name="about_descripcion" class="form-control mb-2"
                              placeholder="Descripción">{{ $linea->about_descripcion ?? '' }}</textarea>
                </div>

                <div class="col-md-12">
                    <textarea name="about_descripcion_extra" class="form-control mb-2"
                              placeholder="Descripción extra">{{ $linea->about_descripcion_extra ?? '' }}</textarea>
                </div>

                <div class="col-md-6">
                    <input type="file" name="about_imagen" class="form-control mb-2">
                    @isset($linea->about_imagen)
                        <img src="{{ asset('imagenes/'.$linea->about_imagen) }}"
                             width="120" class="mt-2">
                    @endisset
                </div>

                <div class="col-md-12">
                    <label>Services (JSON)</label>
                    <textarea name="services" class="form-control" rows="5">
{{ isset($linea) ? json_encode($linea->services, JSON_PRETTY_PRINT) : '' }}
                    </textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-3">
                {{ isset($linea) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>

{{-- ================= TABLA ================= --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped" id="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lineas as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->about_titulo }}</td>
                    <td>{{ $item->about_anio }}</td>
                    <td>
                        @if($item->about_imagen)
                        <img src="{{ asset('imagenes/'.$item->about_imagen) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('linea.edit',$item->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('linea.destroy',$item->id) }}"
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
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

@endsection
