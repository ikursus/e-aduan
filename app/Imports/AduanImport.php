<?php

namespace App\Imports;

use App\Models\Aduan;
use Maatwebsite\Excel\Concerns\ToModel;

class AduanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Aduan([
            'user_id' => $row[0],
            'nama_pengadu' => $row[1],
            'email_pengadu' => $row[2],
            'aduan' => $row[3],
        ]);
    }
}
