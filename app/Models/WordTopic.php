<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'surah',
        'ayat',
        'surah_ayat',
        'arabic_normalize_word',
        'arabic_normalize_word_without_harkat',
        'word_topic',
        'ayat_summary_des',
        'inferance_flag',
        'sub_word_topic',
        'reporting',
    ];
}
