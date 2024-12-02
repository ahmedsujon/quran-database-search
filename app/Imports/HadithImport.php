<?php

namespace App\Imports;

use App\Models\Hadith;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HadithImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // dd($row);
        $hadithData = new Hadith();
        $hadithData->group_name                          = isset($row['group_name'])?$row['group_name'] : null;
        $hadithData->hadith_english                      = isset($row['hadith_english'])?$row['hadith_english'] : null;
        $hadithData->hadith_arabic                       = isset($row['hadith_arabic'])?$row['hadith_arabic'] : null;
        $hadithData->save();
    }
}
