@extends('layouts.app')

@section('content')
    <div class="container">
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
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
@endsection