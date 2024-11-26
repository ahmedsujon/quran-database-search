<?php

namespace App\Imports;

use App\Models\Quran;
use Maatwebsite\Excel\Concerns\ToModel;

class QuranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Quran([
            //
        ]);
    }
}
