<?php

namespace App\Imports;

use App\Models\Store;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StoreImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Store([
            'c_date' => Date::excelToDateTimeObject($row[0]),
            'user_id' => (int)str_replace('CM', '', $row[1]),
            'in_date' => $row[2],
            'location' => $row[3],
            'store_no' => $row[4],
            'content' => $row[5],
            'amount' => $row[6],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
