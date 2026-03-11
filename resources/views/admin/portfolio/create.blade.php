
@extends('adminlte::page')

@section('title', 'Carrusel/Create')

@section('content_header')
    <h1 class="text-center">Añadir Portafolio</h1>
@stop

@section('content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Crear Portfolio</li>
    </ol>

    <div class="card text-bg-light">
        <form action="{{ route('portafolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row m-3">
                <div class="col-md-6 mb-3">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
                    @error('titulo')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Categoría</label>
                    <select name="categoria" class="form-control" required>
                        <option value="noticia" {{ old('categoria') == 'noticia' ? 'selected' : '' }}>Noticias</option>
                        <option value="evento" {{ old('categoria') == 'evento' ? 'selected' : '' }}>Eventos</option>
                        <option value="onomastico" {{ old('categoria') == 'onomastico' ? 'selected' : '' }}>Onomásticos</option>
                    </select>
                    @error('categoria')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row m-3">
                <div class="col-md-6 mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required onchange="previewImage(event)">
                    @error('imagen')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror

                    <!-- Contenedor de previsualización -->
                    <div class="mt-3">
                        <img id="preview" src="#" alt="Previsualización" class="img-fluid rounded border d-none" style="max-height: 150px;">
                    </div>
                </div>
            </div>

            <div class="text-center m-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<style>
    #descripcion {
        resize: none;
    }
</style>
@stop

@section('js')
<script>
    function previewImage(event) {
        let input = event.target;
        let preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none'); // mostrar imagen
            }

            reader.readAsDataURL(input.files[0]); // leer archivo
        }
    }
</script>
@stop
