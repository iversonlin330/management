<?php

namespace App\Imports;

use App\Models\Deposit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepositImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Deposit([
            //
            'c_date' => $row[0],
            'amount' => $row[1],
            'rate' => $row[2],
            'jpy' => $row[3],
            'note' => $row[4]
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
