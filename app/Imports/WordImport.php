<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Word;

class WordImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $hadithData = new Word();
        $hadithData->surah                          = isset($row['surah']) ? $row['surah'] : null;
        $hadithData->ayat                           = isset($row['ayat']) ? $row['ayat'] : null;
        // Create the surah_ayat by concatenating surah_no and ayat_no with a dot (.)
        $hadithData->surah_ayat = $hadithData->surah && $hadithData->ayat
            ? $hadithData->surah . '.' . $hadithData->ayat
            : null;

        $hadithData->word_topic                     = isset($row['word_topic']) ? $row['word_topic'] : null;
        $hadithData->ayat_summary_des               = isset($row['ayat_summary_des']) ? $row['ayat_summary_des'] : null;
        $hadithData->inferance_flag                 = isset($row['inferance_flag']) ? $row['inferance_flag'] : null;
        $hadithData->sub_word_topic                 = isset($row['sub_word_topic']) ? $row['sub_word_topic'] : null;
        $hadithData->save();
    }
}
