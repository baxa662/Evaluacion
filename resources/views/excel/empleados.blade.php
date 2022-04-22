<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Salario</th>
        <th scope="col">Puesto</th>
        <th scope="col">Estatus</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <th scope="row">{{$empleado->id}}</th>
                <td>{{$empleado->nombre.' '.$empleado->apellido}}</td>
                <td>{{$empleado->correo}}</td>
                <td>{{$empleado->salario}}</td>
                <td>{{$empleado->puesto}}</td>
                <td>{{$empleado->estatus == 0 ? 'Activo' : 'Inactivo'}}</td>
            </tr>
            @endforeach
    </tbody>
</table>