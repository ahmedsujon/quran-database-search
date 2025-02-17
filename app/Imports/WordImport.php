<?php

namespace App\Imports;

use App\Models\Quran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\WordTopic;

class WordImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $wordTopicData = new WordTopic();
        $wordTopicData->surah_no = isset($row['surah_no']) ? $row['surah_no'] : null;
        $wordTopicData->ayat_no = isset($row['ayat_no']) ? $row['ayat_no'] : null;

        if ($wordTopicData->surah_no !== null && $wordTopicData->ayat_no !== null) {
            $wordTopicData->surah_ayat = $wordTopicData->surah_no . '.' . $wordTopicData->ayat_no;
        } else {
            $wordTopicData->surah_ayat = null;
        }

        $wordTopicData->word_topic                     = isset($row['word_topic']) ? $row['word_topic'] : null;
        $wordTopicData->arabic_normalize_word                = isset($row['arabic_normalize_word']) ? $row['arabic_normalize_word'] : null;
        $wordTopicData->arabic_normalize_word_without_harkat         = isset($row['arabic_normalize_word']) ? preg_replace("~[\x{064B}-\x{065B}]~u", "", $row['arabic_normalize_word']) : null;
        $wordTopicData->ayat_summary_des               = isset($row['ayat_summary_des']) ? $row['ayat_summary_des'] : null;
        $wordTopicData->inferance_flag                 = isset($row['inferance_flag']) ? $row['inferance_flag'] : null;
        $wordTopicData->sub_word_topic                 = isset($row['sub_word_topic']) ? $row['sub_word_topic'] : null;
        $wordTopicData->reporting                      = isset($row['reporting']) ? $row['reporting'] : null;
        $wordTopicData->save();


        $sura = Quran::where('surah_no', $row['surah_no'])->where('ayat_no', $row['ayat_no'])->first();
        if ($sura->eng_subject_category == null) {
            $sura->eng_subject_category = $row['word_topic'];
        } else {
            $sura->eng_subject_category = $sura->eng_subject_category . ',' . $row['word_topic'];
        }
        $sura->save();
    }
}
