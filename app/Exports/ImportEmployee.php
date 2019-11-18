<?php

namespace App\Exports;

use App\Empolyee;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImportEmployee implements FromCollection
{

    public function collection()
    {
        return Empolyee::all();
    }
}
