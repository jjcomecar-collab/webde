@extends('adminlte::page')

@section('title', 'Squares')

@section('content_header')
    <h1>Gestión de Squares</h1>
@stop

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORMULARIO --}}
    <div class="card mb-4">
        <div class="card-header">
            <h3 id="formTitle">Nuevo Square</h3>
        </div>

        <div class="card-body">
            <form id="formSquare" method="POST" action="{{ route('square.store') }}">
                @csrf
                <input type="hidden" name="_method" id="method" value="POST">

                <div class="form-group mb-3">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="icon">Icono</label>
                    <input type="text" name="icon" id="icon" class="form-control" placeholder="bi bi-activity">
                </div>

                <div class="form-group mb-3">
                    <label for="color_class">Clase Color</label>
                    <input type="text" name="color_class" id="color_class" class="form-control" placeholder="item-cyan">
                </div>

                <div class="form-group mb-3">
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="aos_delay">AOS Delay</label>
                    <input type="number" name="aos_delay" id="aos_delay" class="form-control" value="100">
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="resetForm()">Cancelar</button>
            </form>
        </div>
    </div>

    {{-- TABLA --}}
    <div class="card">
        <div class="card-header">
            <h3>Lista de Squares</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Icono</th>
                        <th>Color</th>
                        <th>URL</th>
                        <th>AOS Delay</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($squares as $square)
                        <tr>
                            <td>{{ $square->id }}</td>
                            <td>{{ $square->title }}</td>
                            <td>
                                <i class="{{ $square->icon }}"></i>
                                {{ $square->icon }}
                            </td>
                            <td>{{ $square->color_class }}</td>
                            <td>
                                <a href="{{ $square->url }}" target="_blank">
                                    {{ $square->url }}
                                </a>
                            </td>
                            <td>{{ $square->aos_delay }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-warning btn-sm btn-editar"
                                    data-id="{{ $square->id }}"
                                    data-title="{{ e($square->title) }}"
                                    data-icon="{{ e($square->icon) }}"
                                    data-color_class="{{ e($square->color_class) }}"
                                    data-url="{{ e($square->url) }}"
                                    data-aos_delay="{{ $square->aos_delay }}"
                                >
                                    Editar
                                </button>

                                <form action="{{ route('square.destroy', $square->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar este square?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-editar').forEach(function (boton) {
        boton.addEventListener('click', function () {
            document.getElementById('formTitle').innerText = 'Editar Square';

            document.getElementById('title').value = this.dataset.title;
            document.getElementById('icon').value = this.dataset.icon;
            document.getElementById('color_class').value = this.dataset.color_class;
            document.getElementById('url').value = this.dataset.url;
            document.getElementById('aos_delay').value = this.dataset.aos_delay;

            document.getElementById('formSquare').action = '/square/' + this.dataset.id;
            document.getElementById('method').value = 'PUT';

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
});

function resetForm() {
    document.getElementById('formTitle').innerText = 'Nuevo Square';
    document.getElementById('formSquare').action = "{{ route('square.store') }}";
    document.getElementById('method').value = 'POST';
    document.getElementById('formSquare').reset();
}
</script>
@stop