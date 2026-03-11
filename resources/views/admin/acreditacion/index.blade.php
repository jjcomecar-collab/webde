@extends('adminlte::page')

@section('title', 'Acreditación')

@section('content')
<div class="container-fluid">

    {{-- FORM --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ isset($item) ? 'Editar' : 'Crear' }} Acreditación</h3>
        </div>

        <form method="POST"
              action="{{ isset($item) ? route('acreditacion.update',$item->id) : route('acreditacion.store') }}"
              enctype="multipart/form-data">
            @csrf
            @isset($item) @method('PUT') @endisset

            <div class="card-body">

                <input type="text" name="about_titulo" class="form-control mb-2"
                       placeholder="Título"
                       value="{{ $item->about_titulo ?? '' }}">

                <input type="text" name="about_subtitulo" class="form-control mb-2"
                       placeholder="Subtítulo"
                       value="{{ $item->about_subtitulo ?? '' }}">

                <textarea name="about_descripcion" class="form-control mb-2"
                          placeholder="Descripción">{{ $item->about_descripcion ?? '' }}</textarea>

                <input type="file" name="about_imagen" class="form-control mb-2">

                <input type="text" name="video_url" class="form-control mb-2"
                       placeholder="URL Video"
                       value="{{ $item->video_url ?? '' }}">

                <textarea name="services" class="form-control mb-2"
                          placeholder='JSON Services'>{{ isset($item) ? json_encode($item->services) : '' }}</textarea>

                <textarea name="service_menu" class="form-control mb-2"
                          placeholder='JSON Menú'>{{ isset($item) ? json_encode($item->service_menu) : '' }}</textarea>

                <input type="text" name="detail_titulo" class="form-control mb-2"
                       placeholder="Título detalle"
                       value="{{ $item->detail_titulo ?? '' }}">

                <textarea name="detail_descripcion" class="form-control mb-2"
                          placeholder="Descripción detalle">{{ $item->detail_descripcion ?? '' }}</textarea>

                <input type="file" name="detail_imagen" class="form-control mb-2">

            </div>

            <div class="card-footer">
                <button class="btn btn-primary">
                    {{ isset($item) ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </form>
    </div>

    {{-- TABLE --}}
    <div class="card mt-4">
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($acreditaciones as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->about_titulo }}</td>
                        <td>
                            <a href="{{ route('acreditacion.edit',$a->id) }}"
                               class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('acreditacion.destroy',$a->id) }}"
                                  method="POST" class="d-inline">
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

</div>
@endsection
