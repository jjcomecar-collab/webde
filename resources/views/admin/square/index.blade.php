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
<!-- jQuery DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
let editando = false;
let squareEditId = null;
let table;

$(document).ready(function() {

    // Inicializar DataTable
    table = $('#tableSquares').DataTable({
        ajax: "{{ route('square.index') }}",
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

    console.log('=== SE PRESIONÓ GUARDAR ===');

    let url = "{{ route('square.store') }}";
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

    console.log('URL:', url);
    console.log('DATOS:', data);

    alert('Se ejecutó el submit');

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        beforeSend: function() {
            console.log('=== ANTES DE ENVIAR AJAX ===');
            alert('Enviando AJAX...');
        },
        success: function(resp) {
            console.log('=== SUCCESS ===');
            console.log(resp);
            alert('Guardó correctamente');

            $('#modalSquare').modal('hide');
            table.ajax.reload(null, false);
        },
        error: function(xhr, status, error) {
            console.log('=== ERROR AJAX ===');
            console.log('STATUS HTTP:', xhr.status);
            console.log('STATUS TEXT:', status);
            console.log('ERROR:', error);
            console.log('RESPONSE TEXT:', xhr.responseText);

            alert(
                'Error AJAX\n' +
                'HTTP: ' + xhr.status + '\n' +
                'Status: ' + status + '\n' +
                'Error: ' + error
            );
        },
        complete: function() {
            console.log('=== FINALIZÓ AJAX ===');
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



<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formSquare');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const url = "{{ route('square.store') }}";

        alert('URL a enviar: ' + url);
        console.log('URL a enviar:', url);

        const data = new FormData();
        data.append('_token', "{{ csrf_token() }}");
        data.append('title', document.getElementById('title').value);
        data.append('icon', document.getElementById('icon').value);
        data.append('color_class', document.getElementById('color_class').value);
        data.append('url', document.getElementById('url').value);
        data.append('aos_delay', document.getElementById('aos_delay').value);

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: data,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const text = await response.text();

            console.log('STATUS HTTP:', response.status);
            console.log('RESPUESTA SERVIDOR:', text);
            alert('HTTP: ' + response.status);

        } catch (error) {
            console.error('ERROR FETCH:', error);
            alert('Error fetch: ' + error.message);
        }
    });
});
</script>
@stop
