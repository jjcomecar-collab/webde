@extends('adminlte::page')

@section('title', 'Squares')

@section('content_header')
    <h1>Gestión de Squares</h1>
@stop

@section('css')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')

{{-- BOTÓN CREAR --}}
<button class="btn btn-primary mb-3" onclick="nuevoSquare()">
    <i class="fas fa-plus"></i> Nuevo Square
</button>

{{-- TABLA DE LISTADO --}}
<table id="tableSquares" class="display table table-bordered table-striped" style="width:100%">
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
</table>

{{-- MODAL CREATE / EDIT --}}
<div class="modal fade" id="modalSquare" tabindex="-1">
    <div class="modal-dialog">
        <form id="formSquare">
            @csrf
            <input type="hidden" id="square_id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Nuevo Square</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Icono</label>
                        <input type="text" id="icon" class="form-control" placeholder="bi bi-activity">
                    </div>

                    <div class="form-group">
                        <label>Clase color</label>
                        <input type="text" id="color_class" class="form-control" placeholder="item-cyan">
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="url" id="url" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>AOS Delay</label>
                        <input type="number" id="aos_delay" class="form-control" value="100">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </form>
    </div>
</div>

@stop

@section('js')
<!-- 1. jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



<script>
let editando = false;
let squareEditId = null;
let table;

$(document).ready(function() {

    // Inicializar DataTable
    table = $('#tableSquares').DataTable({
        // ajax: "{{ route('square.index') }}",
        ajax: "/square",
        columns: [
            { data: 'id' },
            { data: 'title' },
            { 
                data: 'icon',
                render: function(data) {
                    return `<i class="${data}"></i>`;
                }
            },
            { data: 'color_class' },
            { 
                data: 'url',
                render: function(data) {
                    return `<a href="${data}" target="_blank">${data}</a>`;
                }
            },
            { data: 'aos_delay' },
            {
                data: null,
                render: function(row) {
                    return `
                        <button class="btn btn-sm btn-warning" onclick="editarSquare(${row.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarSquare(${row.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                }
            }
        ]
    });

});

// -----------------------------
// NUEVO
// -----------------------------
function nuevoSquare() {
    editando = false;
    squareEditId = null;

    $('#modalTitle').text('Nuevo Square');
    $('#formSquare')[0].reset();
    $('#modalSquare').modal('show');
}

// -----------------------------
// EDITAR
// -----------------------------
function editarSquare(id) {
    editando = true;
    squareEditId = id;

    $.get(`/square/${id}/edit`, function(square) {
        $('#modalTitle').text('Editar Square');
        $('#title').val(square.title);
        $('#icon').val(square.icon);
        $('#color_class').val(square.color_class);
        $('#url').val(square.url);
        $('#aos_delay').val(square.aos_delay);

        $('#modalSquare').modal('show');
    });
}

// -----------------------------
// GUARDAR / ACTUALIZAR
// -----------------------------
$('#formSquare').submit(function(e) {
    e.preventDefault();

    let url = "/square";
    let data = {
        _token: "{{ csrf_token() }}",
        title: $('#title').val(),
        icon: $('#icon').val(),
        color_class: $('#color_class').val(),
        url: $('#url').val(),
        aos_delay: $('#aos_delay').val()
    };

    if (editando) {
        url = `/square/${squareEditId}`;
        data._method = 'PUT';
    }

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function(resp) {
            console.log('GUARDADO OK:', resp);
            alert('Guardado correctamente');
            $('#modalSquare').modal('hide');
            table.ajax.reload(null, false);
        },
        error: function(xhr) {
            console.log('STATUS:', xhr.status);
            console.log('RESPUESTA:', xhr.responseText);
            alert('Error al guardar. STATUS: ' + xhr.status);
        }
    });
});

// -----------------------------
// ELIMINAR
// -----------------------------
function eliminarSquare(id) {
    if (!confirm('¿Eliminar este Square?')) return;

    $.ajax({
        url: `/square/${id}`,
        type: 'POST',
        data: {
            _method: 'DELETE',
            _token: "{{ csrf_token() }}"
        },
        success: function() {
            table.ajax.reload(null, false);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert('❌ Error al eliminar');
        }
    });
}
</script>


@stop
