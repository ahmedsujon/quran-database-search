<?php

namespace App\Imports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $hadithData = new Content();
        $hadithData->topic                          = isset($row['topic'])?$row['topic'] : null;
        $hadithData->search_value                   = isset($row['search_value'])?$row['search_value'] : null;
        $hadithData->save();
    }
}
