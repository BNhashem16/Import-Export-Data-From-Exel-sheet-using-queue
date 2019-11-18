<?php

namespace App\Http\Controllers;

use App\Empolyee;
use App\Exports\ImportEmployee;
use App\Jobs\EmployeeJop;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExelController extends Controller
{
    public function index()
    {
        $data = Empolyee::paginate();
        return view('exel')->with('data', $data );
    }

    public function import()
    {
        (new EmployeeJop)->queue('D:\empolyee.xlsx');
        return back();
    }

    public function export()
    {
        return Excel::download(new ImportEmployee, 'empolyee.xlsx');
    }
}
