<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    .text-center{
        text-align: center;
    }
</style>
<body>
    <h2 class="text-center">Empleados</h2>

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
            
</body>
</html>