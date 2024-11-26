<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class word extends Model
{
    use HasFactory;

    protected $fillable = [
        'surah',
        'ayat',
        'word_topic',
        'ayat_summary_des',
        'inferance_flag',
    ];
}
