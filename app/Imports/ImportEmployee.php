<?php

namespace App\Imports;

use App\Empolyee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportEmployee implements ToModel, WithChunkReading, ShouldQueue
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
