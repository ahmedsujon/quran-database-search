<?php

namespace App\Imports;

use App\Models\Hadith;
use Maatwebsite\Excel\Concerns\ToModel;

class HadithImport implements ToModel
{
    public function model(array $row)
    {
        dd($row);

        $hadithData = new Hadith();
        $hadithData->group_name                          = $row['group_name'];
        $hadithData->hadith_english                      = $row['hadith_english'];
        $hadithData->hadith_arabic                       = $row['hadith_arabic'];
        $hadithData->save();
    }
}
