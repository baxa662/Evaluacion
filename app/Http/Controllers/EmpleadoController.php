<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Exports\EmpleadosExport;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index')
            ->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'salario' => 'required',
            'puesto' => 'required',
            'estatus' => 'required',
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->correo = $request->correo;
        $empleado->salario = $request->salario;
        $empleado->puesto = $request->puesto;
        $empleado->estatus = $request->estatus;
        $empleado->save();

        Session::flash('mensaje', 'El registro se completo exitosamente!');
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.ver')
            ->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.editar')
            ->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'correo' => 'required|string',
            'salario' => 'required|integer',
            'puesto' => 'required|string',
        ]);

        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->correo = $request->correo;
        $empleado->salario = $request->salario;
        $empleado->puesto = $request->puesto;
        $empleado->estatus = $request->estatus;
        $empleado->save();

        Session::flash('mensaje', 'El empleado fue editado exitosamente!');
        return redirect()->route('empleados.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        Session::flash('mensaje', 'Empleado eliminado');
        return redirect()->route('empleados.index');
    }

    public function pdf(){
        $empleados = Empleado::all()->sortBy('estatus');
        $pdf = \PDF::loadView('pdf.pdf', compact('empleados'));
        return $pdf->stream('empleados.pdf');
    }

    public function excel() {
        return Excel::download(new EmpleadosExport, 'Empleados.xlsx');
    }
}
