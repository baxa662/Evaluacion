<?php

namespace App\Exports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class EmpleadosExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Empleado::all()->sortByDesc('estatus');
//     }
// }

class EmpleadosExport implements FromView{
    public function view(): View {
        return view('excel.empleados', [
            'empleados' => Empleado::all()
        ]);
    }
}