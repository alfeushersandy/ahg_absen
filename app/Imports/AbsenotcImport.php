<?php

namespace App\Imports;

use App\Models\Otcabsen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //digunakan untuk menandai excel dengan header

class AbsenotcImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Otcabsen([
            'emp_no' => $row['emp_no'],
            'name' => $row['name'],
            'departemen_name' => $row['department_name'],
            'digit_id' => $row['digit_id'],
            'date' => $row['date'],
            'time_in' => $row['time_in'],
            'time_out' => $row['time_out'],
            'absence' => $row['absence'],
            'manager_comment' => $row['manager_comment']
        ]);
    }
}
