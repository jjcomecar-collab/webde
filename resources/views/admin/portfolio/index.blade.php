
@extends('adminlte::page')

@section('title', 'Portfolio')

@section('content_header')
    <h1>Lista de Portfolio</h1>
@stop

@section('content')
    <div class="container-fluid">

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Portfolio</li>
        </ol>


        <div class="mb-4">
            <a href="{{route('portafolio.create')}}">
                <button type="button" class="btn btn-primary">Añadir nuevo registro</button>
            </a>
        </div>


        <div class="card">

            <div class="card-body">
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Título</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Categoría</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>





                    <tbody>
                        @foreach ($portfolioindex as $dat)
                        <tr>
                            <td class="text-center">
                                {{$dat->id}}
                            </td>

                            <td class="text-center">
                                {{$dat->titulo}}
                            </td>

                            <td class="text-center">
                                {{$dat->descripcion}}
                            </td>
        

                            <td class="text-center">
                                <img src="{{ asset('imagenes_portfolio/'.$dat->imagen) }}" width="100">
                            </td>
                           


                            <td class="text-center">{{ ucfirst($dat->categoria) }}</td>


                            
                            <td class="text-center">
                                @if ($dat->estado == 1)
                                <span class="badge rounded-pill bg-success">Activo</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Eliminado</span>
                                @endif
                            </td> 

                       
                         
                            
                            
                            





                            <td>
                                <div class="d-flex justify-content-around">

                                    <div>
                                        <a href="{{ route('portafolio.edit', $dat) }}" class="btn btn-datatable btn-icon btn-transparent-dark me-2 bg-warning" title="Editar">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>

                       
                                    <div>
                                        <!------Eliminar categoria---->
                                        @if ($dat->estado == 1)
                                        <button title="Eliminar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$dat->id}}" class="btn btn-datatable btn-icon btn-transparent-dark  bg-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @else
                                        <button title="Restaurar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$dat->id}}" class="btn btn-datatable btn-icon btn-transparent-dark  bg-success">
                                            <i class="fa-solid fa-rotate-left"></i>
                                        </button>
                                        @endif
                                    </div>

                                </div>
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="confirmModal-{{$dat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $dat->estado == 1 ? '¿Seguro que quieres eliminar la Imagen?' : '¿Seguro que quieres restaurar la Imagen?' }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <form action="{{ route('portafolio.destroy', $dat->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            @if($dat->estado == 1)
                                                {{-- Botón rojo para eliminar --}}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i> Eliminar
                                                </button>
                                            @else
                                                {{-- Botón verde para restaurar --}}
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa-solid fa-rotate-left"></i> Restaurar
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>




                </table>

            </div>
        </div>

    </div>
@stop





@section('css')

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
    .wrap-text {
    white-space: normal !important;
    word-wrap: break-word;
    max-width: 500px;
    text-align: justify; 
    font-size: 14px;
    }
</style>

@stop





@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <script>
        new DataTable('#example', {


            responsive: {
                details: true
            },

            columnDefs: [
                {
                    targets: 2,
                    className: 'wrap-text',
                }
            ],

        });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
        let message = "{{ session('success') }}";
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: message
        })
    </script>
    @endif
@stop
