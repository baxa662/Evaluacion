<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class CalculoSalarioController extends Controller
{
    public function salario(Request $data){
        $id = $data->id;
        $select = $data->select;
        $salario = Empleado::empleado($id);

        switch($select) {
            case('0'):
                $salario =  $salario[0]->salario * 7;
                $tipo= $select=='0' ? 'semanal' :null;
            break;
            case('1'):
                $salario =  $salario[0]->salario * 15;
                $tipo= $select=='1' ? 'quincenal' :null;
            break;
            case('2'):
                $salario =  $salario[0]->salario * 30;
                $tipo= $select=='2' ? 'mensual' :null;
            break;
            
            default:
            return response()->json(['status' => false ,'salario' => 'ocurrio un error']);
            break;


        }

        return response()->json(['status' => true ,'salario' => $salario, 'tipo' => $tipo]);

       // return view('empleados.index')->with('empleados', $);
        
    }
}
