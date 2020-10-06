<?php

namespace App\Exports;

use App\Beneficiary;
use Maatwebsite\Excel\Concerns\FromCollection;

class BeneficiaryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Beneficiary::all();
    }
}
