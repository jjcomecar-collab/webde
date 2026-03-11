
@extends('adminlte::page')

@section('title', 'Portfolio/Edit')

@section('content_header')
    <h1 class="text-center">Editar Portfolio</h1>
@stop

@section('content')
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>

        <div class="card text-bg-light">

            <form action="{{ route('portafolio.update', $p_portfolio_edit->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')    
                @csrf
                <div class="row m-3">
                    <div class="col-md-6 mb-3">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control" value="{{ $p_portfolio_edit->titulo }}" required>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label>Categoría</label>
                        <select name="categoria" class="form-control" required>
                            <option value="noticia" {{ $p_portfolio_edit->categoria == 'noticia' ? 'selected' : '' }}>Noticias</option>
                            <option value="evento" {{ $p_portfolio_edit->categoria == 'evento' ? 'selected' : '' }}>Eventos</option>
                            <option value="onomastico" {{ $p_portfolio_edit->categoria == 'onomastico' ? 'selected' : '' }}>Onomásticos</option>
                        </select>
                    </div>
                </div>

                <div class="row m-3">
                    <div class="col-md-6 mb-3">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control">{{ $p_portfolio_edit->descripcion }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Imagen</label>
                        <input type="file" name="imagen" class="form-control">

                        {{-- Mostrar la imagen actual si existe --}}
                        @if($p_portfolio_edit->imagen)
                            <div class="mt-2">
                                <p class="mb-1">Imagen actual:</p>
                                <img src="{{ asset('imagenes_portfolio/' . $p_portfolio_edit->imagen) }}" alt="Imagen actual" width="120">
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
               
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="" class="btn btn-secondary">Cancelar</a>
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
    document.querySelector('input[name="imagen"]').addEventListener('change', function (event) {
        let input = event.target;

        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                let previewContainer = document.getElementById('preview-container');
                let previewImage = document.getElementById('preview-image');

                previewContainer.style.display = 'block';
                previewImage.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    });
</script>


@stop
