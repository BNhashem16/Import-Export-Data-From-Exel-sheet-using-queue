<?php

namespace App\Jobs;

use App\Empolyee;
use App\Imports\ImportEmployee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Importable;

class EmployeeJop implements ToModel , WithChunkReading, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels , Importable;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        Excel::import(new ImportEmployee, request()->file('file'));
    }

    public function model(array $row)
    {
        return new Empolyee([
            'name'     => $row[0],
            'email'    => $row[1],
            'age'      => $row[2],
            'phone'    => $row[3],
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
