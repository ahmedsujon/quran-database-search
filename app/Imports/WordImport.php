<?php

namespace App\Imports;

use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;

class WordImport implements ToModel
{
    public function model(array $row)
    {
        $hadithData = new Word();
        $hadithData->surah                          = $row['surah'];
        $hadithData->ayat                           = $row['ayat'];
        $hadithData->word_topic                     = $row['word_topic'];
        $hadithData->ayat_summary_des               = $row['ayat_summary_des'];
        $hadithData->inferance_flag                 = $row['inferance_flag'];
        $hadithData->sub_word_topic                 = $row['sub_word_topic'];
        $hadithData->save();
    }
}
