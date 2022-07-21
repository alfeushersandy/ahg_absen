<?php

namespace App\Imports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absen([
            'date' => $row['emp no'],
            'id' => $row[1],
            'name' => $row[2],
            'status' => $row[3],
            'first_check_in' => $row[4],
            'last_check_out' => $row[5],
            'duration' => $row[6],
            'actual' => $row[7],
            'overtime' => $row[8],
            'remark' => $row[9],
            'departemen' => $row[10]
        ]);
    }
}
