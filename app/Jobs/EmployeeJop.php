<?php

namespace App\Jobs;

use App\Empolyee;
use App\Imports\ImportEmployee;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeJop implements ToModel , WithChunkReading, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels , \Maatwebsite\Excel\Concerns\Importable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
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
