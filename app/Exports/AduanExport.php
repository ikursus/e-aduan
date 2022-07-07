<?php

namespace App\Exports;

use App\Models\Aduan;
use Maatwebsite\Excel\Concerns\FromCollection;

class AduanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aduan::all();
    }
}
