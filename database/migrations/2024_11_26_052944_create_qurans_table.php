<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qurans', function (Blueprint $table) {
            $table->id();
            $table->string('surah_no')->nullable();
            $table->string('ayat_no')->nullable();
            $table->longText('quran_english')->nullable();
            $table->longText('quran_arabic')->nullable();
            $table->text('relevant_hadith_text')->nullable();
            $table->text('surah_name')->nullable();
            $table->text('located')->nullable();
            $table->text('normalized_word')->nullable();
            $table->text('eng_subject_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qurans');
    }
};
