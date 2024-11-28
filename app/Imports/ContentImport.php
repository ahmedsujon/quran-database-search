<?php

namespace App\Imports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\ToModel;

class ContentImport implements ToModel
{
    public function model(array $row)
    {
        $hadithData = new Content();
        $hadithData->topic                          = $row['topic'];
        $hadithData->search_value                   = $row['search_value'];
        $hadithData->save();
    }
}
