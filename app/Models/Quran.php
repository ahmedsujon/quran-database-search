<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    use HasFactory;

    protected $fillable = [
        'surah_no',
        'ayat_no',
        'quran_english',
        'quran_arabic',
        'relevant_hadith_text',
        'surah_name',
        'located',
        'normalized_word',
        'eng_subject_category',
    ];
}
