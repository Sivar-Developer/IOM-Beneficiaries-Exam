<?php

namespace App\Imports;

use App\Beneficiary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BeneficiaryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Beneficiary([
            'name' => $row['name'],
            'birthdate' => $row['birthdate'],
            'gender' => $row['gender'],
            'phone_number' => $row['phone_number'],
            'national_id_number' => $row['national_id_number'],
            'mother_name' => $row['mother_name'],
            'martial_status' => $row['martial_status'],
            'employment_status' => $row['employment_status'],
            'monthly_income' => $row['monthly_income'],
            'photo' => $row['photo'],
        ]);
    }
}
