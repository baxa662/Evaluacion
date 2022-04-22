<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;





    public static function empleado($id)
    {
        return $empleados = Empleado::select('salario')
        ->where('id', $id)->get();
    }



}
