@extends('adminlte::page')

@section('title','CEPEJUP About')

@section('content_header')
<h1>Gestión About</h1>
@endsection

@section('content')

{{-- FORM --}}
<div class="card mb-4">
    <div class="card-header {{ isset($edit) ? 'bg-warning' : 'bg-primary' }} text-white">
        {{ isset($edit) ? 'Editar About' : 'Nuevo About' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($edit) ? route('cepejupabout.update',$edit->id) : route('cepejupabout.store') }}"
              enctype="multipart/form-data">

            @csrf
            @isset($edit) @method('PUT') @endisset

            <div class="row">
                {{-- TITULO --}}
                <input type="text" name="titulo" class="form-control mb-2 col-4"
                    value="{{ old('titulo',$edit->titulo ?? '') }}"
                    placeholder="Título">

                {{-- YEAR --}}
                <input type="text" name="year" class="form-control mb-2 col-4"
                    value="{{ old('year',$edit->year ?? '') }}"
                    placeholder="Año (ej: 2024)">

                {{-- SUBTITULO --}}
                <input type="text" name="subtitulo" class="form-control mb-2 col-4"
                    value="{{ old('subtitulo',$edit->subtitulo ?? '') }}"
                    placeholder="Subtítulo"> 
            </div>
         

            {{-- IMAGEN --}}
            <input type="file" name="imagen" class="form-control mb-2">

            @if(isset($edit) && $edit->imagen)
                <img src="{{ asset('imagenes/'.$edit->imagen) }}" width="120" class="mb-2">
            @endif

            {{-- DESCRIPCION --}}
            <textarea name="descripcion" class="form-control mb-2"
                      placeholder="Descripción principal">{{ old('descripcion',$edit->descripcion ?? '') }}</textarea>

            {{-- ITEMS (JSON) --}}
            <label class="mt-2">Items (uno por línea)</label>
            <textarea name="items" class="form-control mb-2"
                      placeholder="Item 1&#10;Item 2&#10;Item 3">
{{ old('items', isset($edit->items) ? implode("\n",$edit->items) : '') }}
            </textarea>

            {{-- DESCRIPCION FINAL --}}
            <textarea name="descripcion_final" class="form-control mb-2"
                      placeholder="Descripción final">{{ old('descripcion_final',$edit->descripcion_final ?? '') }}</textarea>

            {{-- VIDEO --}}
            <input type="text" name="video_url" class="form-control mb-2"
                   value="{{ old('video_url',$edit->video_url ?? '') }}"
                   placeholder="URL Video (YouTube, Vimeo)">

            {{-- ESTADO --}}
            <select name="estado" class="form-control mb-3">
                <option value="1" {{ old('estado',$edit->estado ?? 1)==1?'selected':'' }}>Activo</option>
                <option value="0" {{ old('estado',$edit->estado ?? 1)==0?'selected':'' }}>Inactivo</option>
            </select>

            <button class="btn btn-success">
                {{ isset($edit) ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>


{{-- TABLE --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abouts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>
                        @if($item->imagen)
                            <img src="{{ asset('imagenes/'.$item->imagen) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('cepejupabout.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('cepejupabout.destroy',$item->id) }}"
                              method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
