<?php

namespace App\Imports;

use App\Beneficiary;
use Maatwebsite\Excel\Concerns\ToModel;

class BeneficiaryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Beneficiary([
            'name' => $row[1],
            'birthdate' => $row[2],
            'gender' => $row[3],
            'phone_number' => $row[4],
            'national_id_number' => $row[5],
            'mother_name' => $row[6],
            'martial_status' => $row[7],
            'employment_status' => $row[8],
            'monthly_income' => $row[9],
            'photo' => $row[10],
        ]);
    }
}
