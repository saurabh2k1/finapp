<?php

namespace App\Imports;

use App\Models\TechDaily;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BulkDailyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TechDaily([
            'tdate'                     => $row['reporting_date'],
            'plant'                     => $row['plant'],
            'capacity_utilisation'      => $row['capacity_utilisation'],
            'power_consumption'         => $row['power_consumption'],
            'longterm_cargo_unloaded'   => $row['longterm_cargo_unloaded'],
            'spot_cargo_unloaded'       => $row['spot_cargo_unloaded'],
            'service_cargo_unloaded'    => $row['service_cargo_unloaded'],
            'C2C3_throughput'           => $row['c2c3_throughput'],
        ]);
    }
}
