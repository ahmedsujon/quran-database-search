<?php

namespace App\Imports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\ToModel;

class ContentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Content([
            //
        ]);
    }
}
