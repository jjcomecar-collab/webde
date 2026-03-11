
@extends('adminlte::page')

@section('title', 'Carrusel/Edit')

@section('content_header')
    <h1>Editar Imagen Carrusel</h1>
@stop

@section('content')
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>

        <div class="card text-bg-light">
            <form action="{{ route('carrusel_update', $p_carrusel_edit->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="row g-4">
                    

                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">

                            {{-- Mostrar la imagen actual si existe --}}
                            @if($p_carrusel_edit->imagen)
                                <div class="mt-2">
                                    <p class="mb-1">Imagen actual:</p>
                                    <img src="{{ asset($p_carrusel_edit->imagen) }}" alt="Imagen actual" width="120">
                                </div>
                            @endif

                            {{-- Aquí aparecerá la nueva imagen --}}
                            <div class="mt-2" id="preview-container" style="display: none;">
                                <p class="mb-1">Nueva imagen:</p>
                                <img id="preview-image" src="#" alt="Previsualización" width="120">
                            </div>

                            @error('imagen')
                                <small class="text-danger">{{ '*'.$message }}</small>
                            @enderror
                        </div>



                    </div>

                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="reset" class="btn btn-secondary">Reiniciar</button>
                </div>
            </form>
        </div>
        
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
document.getElementById("imagen").addEventListener("change", function(event) {
    const input = event.target;
    const previewContainer = document.getElementById("preview-container");
    const previewImage = document.getElementById("preview-image");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = "block";
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        previewContainer.style.display = "none";
    }
});
</script>@stop
