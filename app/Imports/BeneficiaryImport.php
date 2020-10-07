<?php

namespace App\Imports;

use App\Beneficiary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class BeneficiaryImport implements ToModel, WithHeadingRow, SkipsOnFailure, SkipsOnError
{
    use SkipsFailures, SkipsErrors;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Beneficiary([
            'name' => isset($row['name']) ? $row['name'] : null,
            'birthdate' => isset($row['birthdate']) ? $row['birthdate'] : null,
            'gender' => isset($row['gender']) ? $row['gender'] : null,
            'phone_number' => isset($row['phone_number']) ? $row['phone_number'] : null,
            'national_id_number' => isset($row['national_id_number']) ? $row['national_id_number'] : null,
            'mother_name' => isset($row['mother_name']) ? $row['mother_name'] : null,
            'martial_status' => isset($row['martial_status']) ? $row['martial_status'] : null,
            'employment_status' => isset($row['employment_status']) ? $row['employment_status'] : null,
            'monthly_income' => isset($row['monthly_income']) ? $row['monthly_income'] : null,
            'photo' => isset($row['photo']) ? $row['photo'] : null,
        ]);
    }

    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        return 'The Excel or CSV format is not compatible.';
    }
}
