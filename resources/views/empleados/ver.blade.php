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
                <div class="col">
                    <span class="fw-bold">Estatus: </span>{{$empleado->estatus == 0 ? 'Activo' : 'Inactivo'}}
                </div>
            </div>
            <div class="row p-2 fs-6">
                <div id="nodo">
                    <div class="text-start">
                        <label for="periodo" class="form-label">Periodo del salario</label>
                        <select name="periodo" id="periodo" class="form-control">
                            <option value="0" selected="selected">Semanal</option>
                             <option value="1">Quinsenal</option>
                             <option value="2">Mensual</option>
                        </select>
                        <div class="d-grid gap-2">
                            <a id="salario" data-id="{{$empleado->id}}" class="btn btn-primary mt-3">Mostrar</a>
                        </div>
                    </div>
                    <p id="salarioTotal" class="m-3 fs-6">Selecciona el periodo del salario</p>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection

@section('js')
    <script src="{{ asset('js/calculoSalario.js') }}" defer></script>
@endsection