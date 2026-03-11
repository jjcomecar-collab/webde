
@extends('adminlte::page')

@section('title', 'Carrusel/Create')

@section('content_header')
    <h1>Create</h1>
@stop

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Añadir Imagenes en Carrusel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Carrusel</li>
        </ol>
        

        <div class="card text-bg-light">
            <form action="{{ route('carrusel.store') }}" method="post" enctype="multipart/form-data">
                @csrf  {{-- Nos permite enviar formulario --}}
                <div class="card-body">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                            @error('imagen')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror

                            {{-- Contenedor de la previsualización --}}
                            <div class="mt-3">
                                <img id="preview" src="#" alt="Previsualización" class="img-fluid rounded" style="max-height: 100px; display:none;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
    document.getElementById("imagen").addEventListener("change", function(event) {
        let file = event.target.files[0];
        let preview = document.getElementById("preview");

        if (file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = "#";
            preview.style.display = "none";
        }
    });
</script>
@stop
