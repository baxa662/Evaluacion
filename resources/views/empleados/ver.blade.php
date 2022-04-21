@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center border border-2">
            <h3 class="p-2">{{$empleado->nombre.' '.$empleado->apellido}}</h3>
            <div class="row p-2 fs-6">
                <div class="col">
                    <span class="fw-bold">Puesto: </span>{{$empleado->puesto}}
                </div>
                <div class="col">
                    <span class="fw-bold">Salario: </span>{{$empleado->salario}}
                </div>
                <div class="col">
                    <span class="fw-bold">Correo: </span>{{$empleado->correo}}
                </div>
            </div>
        </div>
    </div>
@endsection