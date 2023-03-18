<?php

namespace App\Imports;

use App\Models\Transport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TransportImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Transport([
            'jan_code' => $row[0],
            'out_date' => $row[1],
            'user_id' => (int)str_replace('CM', '', $row[2]),
            'box_no' => $row[3],
            'weight' => $row[4],
            'amount' => $row[5],
            'transport_no' => $row[6],
            'name' => $row[7],
        ]);
    }

//    public function headingRow(): int
//    {
//        return 2;
//    }
    public function startRow(): int
    {
        return 2;
    }
}
