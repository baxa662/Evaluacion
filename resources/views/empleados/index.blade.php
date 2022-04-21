@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

    <div class="container">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#nuevoEmpleado">
            Nuevo empleado
        </button>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje')}}
            </div>
        @endif

        <table id="empleados" class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Funciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <th scope="row">{{$empleado->id}}</th>
                        <td>{{$empleado->nombre.' '.$empleado->apellido}}</td>
                        <td>{{$empleado->correo}}</td>
                        <td>
                            <a href="{{ route('empleados.show', ['empleado'=>$empleado->id]) }}" class="btn btn-primary">Ver</a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$empleado->id}}">Eliminar</a>
                            <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-secondary">Editar</a>
                        </td>
                    </tr>

                     <!-- Modal Eliminar-->
                <div class="modal fade" id="modal-{{$empleado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Al eliminar la categoria <strong>{{$empleado->nombre}}</strong>se eliminan todas las tareas asignadas a la misma.
                        ¿Estas seguro que desea eliminar la categoria <strong>{{$empleado->nombre}}</strong>?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('empleados.destroy', ['empleado'=> $empleado->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </tbody>
          </table>
    </div>
  


    <!-- Modal Nuevo Empleado-->
    <div class="modal fade" id="nuevoEmpleado" tabindex="-1" aria-labelledby="nuevoEmpleado" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo empleado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('empleados.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" >
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo">
                    </div>
                    <div class="mb-3">
                        <label for="salario" class="form-label">Salario diario</label>
                        <input type="text" class="form-control" name="salario" id="salario">
                    </div>
                    <div class="mb-3">
                        <label for="puesto" class="form-label">Puesto</label>
                        <input type="text" class="form-control" name="puesto" id="puesto">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Editar Empleado-->
    <div class="modal fade" id="editarEmpleado" tabindex="-1" aria-labelledby="editarEmpleado" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar empleado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('empleados.update', $empleado) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre') ?? $empleado->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="{{old('apellido') ?? $empleado->apellido}}">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" value="{{old('correo') ?? $empleado->correo}}">
                    </div>
                    <div class="mb-3">
                        <label for="salario" class="form-label">Salario diario</label>
                        <input type="text" class="form-control" name="salario" id="salario" value="{{old('salario') ?? $empleado->salario}}">
                    </div>
                    <div class="mb-3">
                        <label for="puesto" class="form-label">Puesto</label>
                        <input type="text" class="form-control" name="puesto" id="puesto" value="{{old('puesto') ?? $empleado->puesto}}">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#empleados').DataTable({
            "lengthMenu": [[5,10,50,-1],[5,10,50,"Todos"]]
        });
    } );
    </script>
@endsection