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
        $quranData->surah_no                    = isset($row['surah_no']) ? $row['surah_no'] : null;
        $quranData->ayat_no                     = isset($row['ayat_no']) ? $row['ayat_no'] : null;

        // Create the surah_ayat by concatenating surah_no and ayat_no with a dot (.)
        $quranData->surah_ayat = $quranData->surah_no && $quranData->ayat_no
            ? $quranData->surah_no . '.' . $quranData->ayat_no
            : null;

        $quranData->quran_english               = isset($row['quran_english']) ? $row['quran_english'] : null;
        $quranData->quran_arabic                = isset($row['quran_arabic']) ? $row['quran_arabic'] : null;
        $quranData->relevant_hadith_text        = isset($row['relevant_hadith_text']) ? $row['relevant_hadith_text'] : null;
        $quranData->surah_name                  = isset($row['surah_name']) ? $row['surah_name'] : null;
        $quranData->located                     = isset($row['located']) ? $row['located'] : null;
        $quranData->normalized_word             = isset($row['normalized_word']) ? $row['normalized_word'] : null;
        $quranData->eng_subject_category        = isset($row['eng_subject_category']) ? $row['eng_subject_category'] : null;
        $quranData->quran_arabic_harkat         = isset($row['quran_arabic']) ? preg_replace("~[\x{064B}-\x{065B}]~u", "", $row['quran_arabic']) : null;
        $quranData->save();
    }
}
