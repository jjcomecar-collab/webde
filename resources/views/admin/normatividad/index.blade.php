@extends('adminlte::page')

@section('title', 'Normatividad')

@section('content')

{{-- ================= FORMULARIO ================= --}}
<div class="card">
    <div class="card-header">
        <h3 id="form-title">Registrar Normatividad</h3>
    </div>

    <div class="card-body">
        <form id="formNormatividad"
              action="{{ route('normatividad.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="_method" id="method" value="POST">
            <input type="hidden" name="id" id="id">

            <div class="row">
                {{-- SECTION --}}
                <div class="col-md-3">
                    <label>Sección</label>
                    <select name="section" id="section" class="form-control" required>
                        <option value="about">About</option>
                        <option value="feature">Feature</option>
                    </select>
                </div>

                {{-- TIPO --}}
                <div class="col-md-3">
                    <label>Tipo</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="texto">Texto</option>
                        <option value="lista">Lista</option>
                        <option value="archivo">Archivo</option>
                    </select>
                </div>

                {{-- TITULO --}}
                <div class="col-md-6">
                    <label>Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control">
                </div>

                {{-- SUBTITULO --}}
                <div class="col-md-6 mt-2">
                    <label>Subtítulo</label>
                    <input type="text" name="subtitulo" id="subtitulo" class="form-control">
                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="col-md-6 mt-2">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                </div>

                {{-- IMAGEN --}}
                <div class="col-md-6 mt-2">
                    <label>Imagen / Ícono</label>
                    <input type="file" name="icono" class="form-control">
                </div>

                {{-- URL --}}
                <div class="col-md-6 mt-2">
                    <label>URL</label>
                    <input type="text" name="url" id="url" class="form-control">
                </div>

                {{-- COLOR --}}
                <div class="col-md-6 mt-2">
                    <label>Color</label>
                    <input type="color" name="color" id="color" class="form-control">
                </div>
            </div>

            <button class="btn btn-primary mt-3" id="btn-guardar">
                Guardar
            </button>

            <button type="button" class="btn btn-secondary mt-3" onclick="resetForm()">
                Cancelar
            </button>
        </form>
    </div>
</div>

{{-- ================= TABLA ================= --}}
<div class="card mt-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sección</th>
                    <th>Tipo</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($normatividades as $n)
                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->section }}</td>
                    <td>{{ $n->tipo }}</td>
                    <td>{{ $n->titulo }}</td>
                    <td class="d-flex gap-1">

                        {{-- EDITAR --}}
                        <button class="btn btn-warning btn-sm"
                            data-normatividad='@json($n)'
                            onclick="editarNormatividad(this)">
                            Editar
                        </button>

                        {{-- ELIMINAR --}}
                        <form action="{{ route('normatividad.destroy',$n->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar registro?')">
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

{{-- ================= JAVASCRIPT ================= --}}
@section('js')
<script>
function editarNormatividad(btn) {

    let data = JSON.parse(btn.dataset.normatividad);

    document.getElementById('form-title').innerText = 'Editar Normatividad';
    document.getElementById('btn-guardar').innerText = 'Actualizar';

    document.getElementById('formNormatividad').action =
        "{{ url('normatividad') }}/" + data.id;

    document.getElementById('method').value = 'PUT';
    document.getElementById('id').value = data.id;

    document.getElementById('section').value = data.section;
    document.getElementById('tipo').value = data.tipo;
    document.getElementById('titulo').value = data.titulo;
    document.getElementById('subtitulo').value = data.subtitulo;
    document.getElementById('descripcion').value = data.descripcion;
    document.getElementById('url').value = data.url;
    document.getElementById('color').value = data.color;

    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function resetForm() {

    document.getElementById('formNormatividad').action =
        "{{ route('normatividad.store') }}";

    document.getElementById('method').value = 'POST';
    document.getElementById('form-title').innerText = 'Registrar Normatividad';
    document.getElementById('btn-guardar').innerText = 'Guardar';

    document.getElementById('formNormatividad').reset();
}
</script>
@endsection
