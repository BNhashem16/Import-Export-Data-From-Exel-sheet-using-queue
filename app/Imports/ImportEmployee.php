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
}
