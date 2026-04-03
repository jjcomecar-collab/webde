@extends('adminlte::page')

@section('title', 'About')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{ isset($about) ? 'Editar About' : 'Crear About' }}
    </div>

    <div class="card-body">
        <form method="POST"
            action="{{ isset($about)
                ? route('admin.abouts.update', ['modulo'=>$modulo,'about'=>$about->id])
                : route('admin.abouts.store', ['modulo'=>$modulo]) }}"
            enctype="multipart/form-data">

            @csrf
            @isset($about) @method('PUT') @endisset

            {{-- TITULO --}}
            <input type="text" name="titulo" class="form-control mb-2"
                placeholder="Título"
                value="{{ $about->titulo ?? '' }}">

            {{-- SUBTITULO --}}
            <input type="text" name="subtitulo" class="form-control mb-2"
                placeholder="Subtítulo"
                value="{{ $about->subtitulo ?? '' }}">

            {{-- AÑO --}}
            <input type="number" name="year" class="form-control mb-2"
                placeholder="Año"
                value="{{ $about->year ?? '' }}">

            {{-- IMAGEN --}}
            <input type="file" name="imagen" class="form-control mb-2">

            {{-- DESCRIPCIÓN --}}
            <textarea name="descripcion" class="form-control mb-2"
                    placeholder="Descripción principal">{{ $about->descripcion ?? '' }}</textarea>

            {{-- ITEMS (JSON) --}}
            <input type="text" name="items" class="form-control mb-2"
                placeholder="item1,item2,item3"
                value="{{ isset($about) ? implode(',', $about->items ?? []) : '' }}">

            {{-- DESCRIPCIÓN FINAL --}}
            <textarea name="descripcion_final" class="form-control mb-2"
                    placeholder="Descripción final">{{ $about->descripcion_final ?? '' }}</textarea>

            {{-- VIDEO --}}
            <input type="text" name="video_url" class="form-control mb-2"
                placeholder="URL del video (YouTube, Vimeo)"
                value="{{ $about->video_url ?? '' }}">

            <button class="btn btn-primary">
                {{ isset($about) ? 'Actualizar' : 'Guardar' }}
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
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abouts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>
                        @if($item->estado == 1)
                            <span class="badge bg-success">Activo</span>    
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.abouts.edit',[
                            'modulo'=>$modulo,'about'=>$item->id
                        ]) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form method="POST" class="d-inline"
                              action="{{ route('admin.abouts.destroy',[
                                  'modulo'=>$modulo,'about'=>$item->id
                              ]) }}">
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
