@extends('adminlte::page')

@section('title','Detalle de Servicios')

@section('content_header')
<h1>Detalle de Servicios</h1>
@endsection

@section('content')



{{-- FORM --}}
<div class="card mb-4">
    <div class="card-header {{ isset($edit) ? 'bg-warning' : 'bg-primary' }} text-white">
        {{ isset($edit) ? 'Editar Detalle' : 'Nuevo Detalle' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($edit) 
                        ? route('cepejupservice-details.update',$edit->id) 
                        : route('cepejupservice-details.store') }}"
              enctype="multipart/form-data">

            @csrf
            @isset($edit) @method('PUT') @endisset

            {{-- TITULO --}}
            <input type="text" name="titulo" class="form-control mb-2"
                   value="{{ $edit->titulo ?? '' }}" placeholder="Título">

            {{-- IMAGEN --}}
            <input type="file" name="imagen" class="form-control mb-2">

            {{-- DESCRIPCIÓN --}}
            <textarea name="descripcion" class="form-control mb-2"
                      placeholder="Descripción">{{ $edit->descripcion ?? '' }}</textarea>

            {{-- MENU ACTIVO --}}
            <input type="text" name="menu_activo" class="form-control mb-2"
                   value="{{ $edit->menu_activo ?? '' }}"
                   placeholder="Menu activo">

            {{-- MENU (JSON) --}}
            <label class="mt-2">Menú lateral (uno por línea)</label>
            <textarea name="menu" class="form-control mb-2" rows="4"
                      placeholder="Item 1&#10;Item 2&#10;Item 3">{{ 
                isset($edit->menu) ? implode("\n",$edit->menu) : '' 
            }}</textarea>

            {{-- LISTA CHECKS --}}
            <label>Lista checks (uno por línea)</label>
            <textarea name="lista" class="form-control mb-2" rows="4"
                      placeholder="Check 1&#10;Check 2">{{ 
                isset($edit->lista) ? implode("\n",$edit->lista) : '' 
            }}</textarea>

            {{-- CONTENIDO EXTRA --}}
            <textarea name="contenido_1" class="form-control mb-2"
                      placeholder="Contenido 1">{{ $edit->contenido_1 ?? '' }}</textarea>

            <textarea name="contenido_2" class="form-control mb-3"
                      placeholder="Contenido 2">{{ $edit->contenido_2 ?? '' }}</textarea>

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
                @foreach($details as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>
                        @if($item->imagen)
                            <img src="{{ asset('imagenes/'.$item->imagen) }}" width="70">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('cepejupservice-details.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('cepejupservice-details.destroy',$item->id) }}"
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
