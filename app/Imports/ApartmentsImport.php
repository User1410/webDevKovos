<?php

namespace App\Imports;

use App\Models\Apartment;
use Illuminate\Cache\NullStore;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ApartmentsImport implements ToModel, WithCustomCsvSettings, WithHeadingRow
{

    public function getCsvSettings(): array {
        return [
            'delimiter' => ','
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        return new Apartment([
            'name' => $row['name'],
            'location' => $row['location'],
            'floor' => $row['floor'],
            'bedrooms' => $row['bedrooms'],
            'car_spaces' => $row['car_spaces'],
            'living_spaces' => $row['living_spaces'],
            'bathrooms' => $row['bathrooms'],
            'area' => $row['area'],
            'price' => $row['price'],
            'status' => $row['status'],
            'date_sell_from' => strtotime($row['date_sell_from']) ? $row['date_sell_from'] : NULL,
            'date_sell_to' => strtotime($row['date_sell_to']) ? $row['date_sell_to'] : NULL
        ]);
    }
}
