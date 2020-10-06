<?php

namespace App\Exports;

use App\Beneficiary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeneficiaryExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Birthdate',
            'Gender',
            'Phone Number',
            'National ID Number',
            'Mother Name',
            'Martial Status',
            'Employment Status',
            'Monthly Income',
            'Photo',
            'Created At',
            'Updated At'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Beneficiary::all();
    }
}
