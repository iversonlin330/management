<?php

namespace App\Imports;

use App\Models\Transport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TransportImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Transport([
            'store_id' => $row[0],
            'name' => $row[1],
            'jan_code' => $row[2],
            'price' => $row[3],
            'weight' => $row[4],
            'amount' => $row[5],
            'price_total' => $row[6],
            'weight_total' => $row[7],
            'out_date' => $row[8],
            'box_no' => $row[9],
            'transport_no' => $row[10],
            'user_id' => (int)str_replace('CM', '', $row[11])
//            'c_date' => Date::excelToDateTimeObject($row['c_date']),
//            'amount' => $row['amount'],
//            'rate' => $row['rate'],
//            'jpy' => $row['jpy'],
//            'note' => $row['note'],
//            'user_id' => $row['user_id']
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
