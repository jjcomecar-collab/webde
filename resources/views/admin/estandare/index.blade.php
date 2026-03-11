@extends('adminlte::page')

@section('title', 'Estandares')

@section('content_header')
    <h1>Gestión de Estandares</h1>
@endsection

@section('content')

{{-- ================= FORMULARIO ================= --}}
<div class="card mb-4">
    <div class="card-header {{ isset($edit) ? 'bg-warning' : 'bg-primary' }} text-white">
        {{ isset($edit) ? 'Editar Estandar' : 'Crear Estandar' }}
    </div>

    <div class="card-body">
        <form
            action="{{ isset($edit) ? route('estandare.update',$edit->id) : route('estandare.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($edit)) @method('PUT') @endif

            {{-- ================= ABOUT ================= --}}
            <h5 class="text-primary">ABOUT</h5>
            <div class="row">

                <div class="col-md-4">
                    <label>Título</label>
                    <input type="text" name="about_titulo"
                        value="{{ old('about_titulo', $edit->about_titulo ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Subtítulo</label>
                    <input type="text" name="about_subtitulo"
                        value="{{ old('about_subtitulo', $edit->about_subtitulo ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Año</label>
                    <input type="text" name="about_anio"
                        value="{{ old('about_anio', $edit->about_anio ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-12 mt-2">
                    <label>Descripción</label>
                    <textarea name="about_descripcion" class="form-control">{{ old('about_descripcion', $edit->about_descripcion ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lista (About)</label>

                    <div id="about-lista-wrapper">

                        @if(old('about_lista', $edit->about_lista ?? []))
                            @foreach(old('about_lista', $edit->about_lista ?? []) as $item)
                                <div class="d-flex gap-2 mb-2">
                                    <input type="text"
                                        name="about_lista[]"
                                        class="form-control"
                                        value="{{ $item }}"
                                        placeholder="Texto del ítem">
                                    <button type="button"
                                            class="btn btn-danger"
                                            onclick="removeItem(this)">✖</button>
                                </div>
                            @endforeach
                        @else
                            {{-- Si no hay datos, deja uno vacío --}}
                            <div class="d-flex gap-2 mb-2">
                                <input type="text"
                                    name="about_lista[]"
                                    class="form-control"
                                    placeholder="Texto del ítem">
                                <button type="button"
                                        class="btn btn-danger"
                                        onclick="removeItem(this)">✖</button>
                            </div>
                        @endif

                    </div>


                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addItem()">
                        ➕ Agregar ítem
                    </button>
                </div>


                <div class="col-md-6 mt-2">
                    <label>Video URL</label>
                    <input type="text" name="about_video_url"
                        value="{{ old('about_video_url', $edit->about_video_url ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label>Imagen</label>
                    <input type="file" name="about_imagen" class="form-control">
                    @if(isset($edit) && $edit->about_imagen)
                        <img src="{{ asset('imagenes/'.$edit->about_imagen) }}" width="100" class="mt-2">
                    @endif
                </div>
            </div>

            <hr>

            {{-- ================= SERVICES ================= --}}
            <h5 class="text-primary">SERVICES</h5>
            <textarea name="services" class="form-control">{{ old('services', isset($edit) ? json_encode($edit->services, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) : '') }}</textarea>

            <hr>

            {{-- ================= SERVICE DETAILS ================= --}}
            <h5 class="text-primary">SERVICE DETAILS</h5>
            <div class="row">

                <div class="col-md-6">
                    <label>Menú (JSON)</label>
                    <textarea name="service_menu" class="form-control">{{ old('service_menu', isset($edit) ? json_encode($edit->service_menu, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label>Título</label>
                    <input type="text" name="service_detalle_titulo"
                        value="{{ old('service_detalle_titulo', $edit->service_detalle_titulo ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-12 mt-2">
                    <label>Descripción</label>
                    <textarea name="service_detalle_descripcion" class="form-control">{{ old('service_detalle_descripcion', $edit->service_detalle_descripcion ?? '') }}</textarea>
                </div>

                <div class="col-md-6 mt-2">
                    <label>Imagen</label>
                    <input type="text" name="service_detalle_imagen"
                        value="{{ old('service_detalle_imagen', $edit->service_detalle_imagen ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label>Lista (JSON)</label>
                    <textarea name="service_detalle_lista" class="form-control">{{ old('service_detalle_lista', isset($edit) ? json_encode($edit->service_detalle_lista, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                </div>
            </div>

            <hr>

            {{-- ================= FEATURES ================= --}}
            <h5 class="text-primary">FEATURES</h5>
            <div class="row">

                <div class="col-md-6">
                    <label>Título</label>
                    <input type="text" name="features_titulo"
                        value="{{ old('features_titulo', $edit->features_titulo ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Subtítulo</label>
                    <input type="text" name="features_subtitulo"
                        value="{{ old('features_subtitulo', $edit->features_subtitulo ?? '') }}"
                        class="form-control">
                </div>

                <div class="col-md-12 mt-2">
                    <label>Items (JSON)</label>
                    <textarea name="features_items" class="form-control">{{ old('features_items', isset($edit) ? json_encode($edit->features_items, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn {{ isset($edit) ? 'btn-warning' : 'btn-success' }}">
                    {{ isset($edit) ? 'Actualizar' : 'Guardar' }}
                </button>

                @if(isset($edit))
                    <a href="{{ route('estandare.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- ================= TABLA ================= --}}
<div class="card">
    <div class="card-header bg-dark text-white">
        Lista de Estandares
    </div>

    <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Features</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->about_titulo }}</td>
                    <td>{{ $item->about_anio }}</td>
                    <td>{{ $item->features_titulo }}</td>
                    <td>
                        @if($item->about_imagen)
                            <img src="{{ asset('imagenes/'.$item->about_imagen) }}" width="70">
                        @endif
                    </td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('estandare.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('estandare.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
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

@section('js')
<script>
    $(function () {
        $('#tabla').DataTable();
    });
</script>


<script>
function addItem() {
  const wrapper = document.getElementById('about-lista-wrapper');

  wrapper.insertAdjacentHTML('beforeend', `
    <div class="d-flex gap-2 mb-2">
      <input type="text" name="about_lista[]" class="form-control" placeholder="Texto del ítem">
      <button type="button" class="btn btn-danger" onclick="removeItem(this)">✖</button>
    </div>
  `);
}

function removeItem(btn) {
  btn.parentElement.remove();
}
</script>

@endsection
