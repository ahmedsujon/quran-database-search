<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\WordTopic;

class WordImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $wordTopicData = new WordTopic();
        $wordTopicData->surah                          = isset($row['surah']) ? $row['surah'] : null;
        $wordTopicData->ayat                           = isset($row['ayat']) ? $row['ayat'] : null;
        // Create the surah_ayat by concatenating surah_no and ayat_no with a dot (.)
        $wordTopicData->surah_ayat = $wordTopicData->surah && $wordTopicData->ayat
            ? $wordTopicData->surah . '.' . $wordTopicData->ayat
            : null;

        $wordTopicData->word_topic                     = isset($row['word_topic']) ? $row['word_topic'] : null;
        $wordTopicData->arabic_normalize_word                = isset($row['arabic_normalize_word']) ? $row['arabic_normalize_word'] : null;
        $wordTopicData->arabic_normalize_word_without_harkat         = isset($row['arabic_normalize_word']) ? preg_replace("~[\x{064B}-\x{065B}]~u", "", $row['arabic_normalize_word']) : null;
        $wordTopicData->ayat_summary_des               = isset($row['ayat_summary_des']) ? $row['ayat_summary_des'] : null;
        $wordTopicData->inferance_flag                 = isset($row['inferance_flag']) ? $row['inferance_flag'] : null;
        $wordTopicData->sub_word_topic                 = isset($row['sub_word_topic']) ? $row['sub_word_topic'] : null;
        $wordTopicData->reporting                      = isset($row['reporting']) ? $row['reporting'] : null;
        $wordTopicData->save();
    }
}
