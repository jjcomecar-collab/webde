@extends('adminlte::page')

@section('title', 'Autoridades')

@section('content')

<div class="card mb-4">
  <div class="card-header bg-primary text-white">
    {{ isset($autoridad) ? 'Editar Autoridad' : 'Nueva Autoridad' }}
  </div>

  <div class="card-body">
    <form method="POST"
          action="{{ isset($autoridad) ? route('autoridade.update',$autoridad->id) : route('autoridade.store') }}"
          enctype="multipart/form-data">

      @csrf
      @if(isset($autoridad)) @method('PUT') @endif

      <div class="row">
        <div class="col-md-4 mb-3">
          <label>Cargo</label>
          <input type="text" name="cargo" class="form-control"
                 value="{{ $autoridad->cargo ?? '' }}" required>
        </div>

        <div class="col-md-4 mb-3">
          <label>Nombre</label>
          <input type="text" name="nombre" class="form-control"
                 value="{{ $autoridad->nombre ?? '' }}" required>
        </div>

        <div class="col-md-4 mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control"
                 value="{{ $autoridad->email ?? '' }}">
        </div>

        <div class="col-md-4 mb-3">
          <label>Orden</label>
          <input type="number" name="orden" class="form-control"
                 value="{{ $autoridad->orden ?? 0 }}">
        </div>

        <div class="col-md-4 mb-3">
          <label>Imagen</label>
          <input type="file" name="imagen" class="form-control">
        </div>

        <div class="col-md-4 mb-3 d-flex align-items-end">
          <button class="btn btn-success w-100">
            {{ isset($autoridad) ? 'Actualizar' : 'Guardar' }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

{{-- TABLA --}}
<div class="card">
  <div class="card-header bg-dark text-white">
    Lista de Autoridades
  </div>

  <div class="card-body">
    <table class="table table-bordered table-striped" id="datatable">
      <thead>
        <tr>
          <th>Orden</th>
          <th>Cargo</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        @foreach($autoridades as $item)
        <tr>
          <td>{{ $item->orden }}</td>
          <td>{{ $item->cargo }}</td>
          <td>{{ $item->nombre }}</td>
          <td>{{ $item->email }}</td>
          <td>
            @if($item->imagen)
              <img src="{{ asset('imagenes_autoridades/'.$item->imagen) }}" width="60">
            @endif
          </td>
          <td class="d-flex gap-1">
            <a href="{{ route('autoridade.edit',$item->id) }}" class="btn btn-warning btn-sm">
              Editar
            </a>

            <form method="POST" action="{{ route('autoridade.destroy',$item->id) }}">
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
