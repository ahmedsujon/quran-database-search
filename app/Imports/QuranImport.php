<?php

namespace App\Imports;

use App\Models\Quran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuranImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $quranData = new Quran();
        $quranData->surah_no                            = $row['surah_no'];
        $quranData->ayat_no                             = $row['ayat_no'];
        $quranData->quran_english                       = $row['quran_english'];
        $quranData->quran_arabic                        = $row['quran_arabic'];
        $quranData->relevant_hadith_text                = $row['relevant_hadith_text'];
        $quranData->surah_name                          = $row['surah_name'];
        $quranData->located                             = $row['located'];
        $quranData->normalized_word                     = $row['normalized_word'];
        $quranData->eng_subject_category                = $row['eng_subject_category'];
        $quranData->quran_arabic_harkat                 = preg_replace("~[\x{064B}-\x{065B}]~u", "", $row['quran_arabic']);

        $quranData->save();
    }
}
