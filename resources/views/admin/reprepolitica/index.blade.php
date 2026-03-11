@extends('adminlte::page')

@section('title', 'Representación Política')

@section('content')
<div class="container-fluid">

{{-- FORMULARIO --}}
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">{{ isset($item) ? 'Editar' : 'Crear' }}</h3>
</div>

<form method="POST"
      action="{{ isset($item) ? route('reprepolitica.update',$item->id) : route('reprepolitica.store') }}"
      enctype="multipart/form-data">
@csrf
@if(isset($item)) @method('PUT') @endif

<div class="card-body">

<input class="form-control mb-2" name="page_title" placeholder="Título página"
       value="{{ $item->page_title ?? '' }}">

<input class="form-control mb-2" name="inner_title" placeholder="Título interno"
       value="{{ $item->inner_title ?? '' }}">

<input class="form-control mb-2" name="year" placeholder="Año"
       value="{{ $item->year ?? '' }}">

<input class="form-control mb-2" name="story_title" placeholder="Título historia"
       value="{{ $item->story_title ?? '' }}">

<textarea class="form-control mb-2" name="description" placeholder="Descripción">
{{ $item->description ?? '' }}</textarea>

{{-- LISTA --}}
@for($i=0;$i<3;$i++)
<input class="form-control mb-2" name="list_items[]"
value="{{ $item->list_items[$i] ?? '' }}" placeholder="Item {{ $i+1 }}">
@endfor

<textarea class="form-control mb-2" name="final_text" placeholder="Texto final">
{{ $item->final_text ?? '' }}</textarea>

<input class="form-control mb-2" name="video_url" placeholder="URL video"
       value="{{ $item->video_url ?? '' }}">

<input type="file" name="image" class="form-control">

@if(isset($item->image))
<img src="{{ asset('imagenes/'.$item->image) }}" width="120" class="mt-2">
@endif

</div>

<div class="card-footer">
<button class="btn btn-primary">
{{ isset($item) ? 'Actualizar' : 'Guardar' }}
</button>
</div>

</form>
</div>

{{-- TABLA --}}
<div class="card mt-4">
<div class="card-body">
<table id="tabla" class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Título</th>
<th>Imagen</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach($items as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->page_title }}</td>
<td>
@if($row->image)
<img src="{{ asset('imagenes/'.$row->image) }}" width="80">
@endif
</td>
<td>
<a href="{{ route('reprepolitica.edit',$row->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('reprepolitica.destroy',$row->id) }}"
      method="POST" style="display:inline">
@csrf @method('DELETE')
<button class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

</div>
@endsection

@section('js')
<script>
$(function () {
    $('#tabla').DataTable();
});
</script>
@endsection
