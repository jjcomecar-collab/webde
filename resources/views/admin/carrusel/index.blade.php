@extends('adminlte::page')

@section('title', 'Carrusel')

@section('content_header')
    <h1>Lista de Carrusel</h1>
@stop

@section('content')
<div class="container-fluid">

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Carrusel</li>
    </ol>

    <div class="mb-3">
        <button class="btn btn-primary" id="btnNuevo">+ Nuevo Carrusel</button>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="tablaCarrusel" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($tablecarrusel as $dat)
                    <tr id="fila_{{ $dat->id }}" data-estado="{{ $dat->estado }}"
                        class="{{ $dat->estado == 0 ? 'table-secondary' : '' }}">

                        <td class="text-center">{{ $dat->id }}</td>

                        <td class="text-center">
                            <img src="{{ asset($dat->imagen) }}" width="100">
                        </td>

                        <td class="text-center">
                            <span class="badge {{ $dat->estado ? 'bg-success' : 'bg-danger' }}">
                                {{ $dat->estado ? 'Activo' : 'Eliminado' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <button class="btn btn-warning btnEditar"
                                    data-id="{{ $dat->id }}"
                                    data-imagen="{{ asset($dat->imagen) }}">
                                ✏️
                            </button>

                            <button class="btn btnEliminar {{ $dat->estado ? 'btn-danger' : 'btn-success' }}"
                                    data-id="{{ $dat->id }}">
                                {{ $dat->estado ? '🗑' : '♻️' }}
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- MODAL CREATE / EDIT --}}
<div class="modal fade" id="modalCarrusel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formCarrusel" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="carrusel_id">

                <div class="modal-header">
                    <h5 class="modal-title">Carrusel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="file" name="imagen" class="form-control">
                    <img id="preview" class="mt-2" width="120" style="display:none">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

<script>
/* ===============================
   DATATABLE
================================ */
new DataTable('#tablaCarrusel', {
    responsive: true
});

/* ===============================
   MODAL CREATE / EDIT
================================ */
let modo = 'create';

$('#btnNuevo').click(function () {
    modo = 'create';
    $('#formCarrusel')[0].reset();
    $('#carrusel_id').val('');
    $('#preview').hide();
    $('#modalCarrusel').modal('show');
});

$(document).on('click', '.btnEditar', function () {
    modo = 'edit';
    $('#carrusel_id').val($(this).data('id'));
    $('#preview').attr('src', $(this).data('imagen')).show();
    $('#modalCarrusel').modal('show');
});

/* ===============================
   STORE / UPDATE
================================ */
$('#formCarrusel').submit(function (e) {
    e.preventDefault();

    let formData = new FormData(this);
    let id = $('#carrusel_id').val();
    let url = modo === 'create'
        ? "{{ route('carrusel.store') }}"
        : "/carrusel/" + id;

    if (modo === 'edit') {
        formData.append('_method', 'PUT');
    }

    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
            location.reload(); // luego lo podemos eliminar
        }
    });
});

/* ===============================
   DELETE / RESTORE
================================ */
$(document).on('click', '.btnEliminar', function () {

    let btn = $(this);
    let id = btn.data('id');
    let fila = $('#fila_' + id);

    if (!confirm('¿Cambiar estado de esta imagen?')) return;

    $.ajax({
        url: '/carrusel/' + id,
        type: 'POST',
        data: {
            _method: 'DELETE',
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {

            if (res.estado == 0) {
                fila.addClass('table-secondary');
                fila.find('.badge').removeClass('bg-success').addClass('bg-danger').text('Eliminado');
                btn.removeClass('btn-danger').addClass('btn-success').text('♻️');
            } else {
                fila.removeClass('table-secondary');
                fila.find('.badge').removeClass('bg-danger').addClass('bg-success').text('Activo');
                btn.removeClass('btn-success').addClass('btn-danger').text('🗑');
            }
        }
    });
});
</script>
@stop
