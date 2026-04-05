@extends('adminlte::page')

@section('title', 'Integrantes de Círculos')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        {{ isset($circuloEdit) ? 'Editar Integrante' : 'Registrar Integrante' }}
    </div>

    <div class="card-body">
        <form method="POST"
              action="{{ isset($circuloEdit) ? route('circulo.update', $circuloEdit->id) : route('circulo.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($circuloEdit))
                @method('PUT')
            @endif

            <div class="row">
                {{-- NOMBRE DEL CIRCULO --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nombre del círculo</label>
                    <input type="text"
                           name="circulo"
                           class="form-control"
                           placeholder="Ej: Círculo Lex"
                           value="{{ old('circulo', $circuloEdit->circulo ?? '') }}"
                           required>
                </div>

                {{-- NOMBRE DEL INTEGRANTE --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label">Nombre del integrante</label>
                    <input type="text"
                           name="nombre"
                           class="form-control"
                           placeholder="Nombre completo"
                           value="{{ old('nombre', $circuloEdit->nombre ?? '') }}"
                           required>
                </div>

                {{-- CARGO --}}
                <div class="col-md-2 mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text"
                           name="cargo"
                           class="form-control"
                           placeholder="Ej: Presidente"
                           value="{{ old('cargo', $circuloEdit->cargo ?? '') }}">
                </div>

                {{-- ORDEN --}}
                <div class="col-md-2 mb-3">
                    <label class="form-label">Orden</label>
                    <input type="number"
                           name="orden"
                           class="form-control"
                           min="1"
                           placeholder="1"
                           value="{{ old('orden', $circuloEdit->orden ?? 1) }}"
                           required>
                </div>

                {{-- IMAGEN --}}
                <div class="col-md-2 mb-3">
                    <label class="form-label">Imagen</label>
                    <input type="file"
                           name="imagen"
                           class="form-control">
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">
                    {{ isset($circuloEdit) ? 'Actualizar' : 'Guardar' }}
                </button>

                @if(isset($circuloEdit))
                    <a href="{{ route('circulo.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Listado de integrantes
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th width="80">Imagen</th>
                    <th>Círculo</th>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th width="180">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($circulos as $item)
                    <tr>
                        <td class="text-center">
                            <img src="{{ $item->imagen ? asset('imagenes/' . $item->imagen) : asset('student/main/assets/img/team/UserImg.png') }}"
                                 width="55"
                                 height="55"
                                 style="object-fit: cover; border-radius: 6px;">
                        </td>

                        <td>{{ $item->circulo }}</td>
                        <td>{{ $item->orden }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->cargo }}</td>
                        <td>
                            @if($item->estado == 1)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Eliminado</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('circulo.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('circulo.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este integrante?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay integrantes registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection



@section('js')
<script>
const form = document.querySelector('form');
const metodo = document.querySelector('input[name="_method"]') || null;

const inputCirculo = document.querySelector('input[name="circulo"]');
const inputNombre = document.querySelector('input[name="nombre"]');
const inputCargo = document.querySelector('input[name="cargo"]');
const inputOrden = document.querySelector('input[name="orden"]');

const btnSubmit = document.querySelector('button[type="submit"]');

// Crear botón cancelar dinámicamente
let btnCancelar = document.createElement('button');
btnCancelar.type = 'button';
btnCancelar.className = 'btn btn-secondary ms-2';
btnCancelar.innerText = 'Cancelar';
btnCancelar.style.display = 'none';

btnSubmit.parentNode.appendChild(btnCancelar);


// ================= EDITAR =================
document.querySelectorAll('.btn-editar').forEach(btn => {
    btn.addEventListener('click', function () {

        inputCirculo.value = this.dataset.circulo;
        inputNombre.value = this.dataset.nombre;
        inputCargo.value = this.dataset.cargo ?? '';
        inputOrden.value = this.dataset.orden ?? 1;

        // Cambiar acción del form
        form.action = `/circulo/${this.dataset.id}`;

        // Crear input method PUT si no existe
        let methodInput = document.querySelector('input[name="_method"]');
        if (!methodInput) {
            methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            form.appendChild(methodInput);
        }
        methodInput.value = 'PUT';

        btnSubmit.innerText = 'Actualizar';
        btnCancelar.style.display = 'inline-block';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});


// ================= CANCELAR =================
btnCancelar.addEventListener('click', function () {
    form.action = "{{ route('circulo.store') }}";

    let methodInput = document.querySelector('input[name="_method"]');
    if (methodInput) methodInput.remove();

    form.reset();
    btnSubmit.innerText = 'Guardar';
    btnCancelar.style.display = 'none';
});
</script>
@endsection