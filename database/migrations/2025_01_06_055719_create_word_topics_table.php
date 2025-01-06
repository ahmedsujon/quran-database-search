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
        Schema::create('word_topics', function (Blueprint $table) {
            $table->id();
            $table->string('surah')->nullable();
            $table->string('ayat')->nullable();
            $table->string('surah_ayat')->nullable();
            $table->text('word_topic')->nullable();
            $table->longText('ayat_summary_des')->nullable();
            $table->string('inferance_flag')->nullable();
            $table->longText('sub_word_topic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_topics');
    }
};
