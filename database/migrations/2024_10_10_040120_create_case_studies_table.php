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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('thumb')->nullable();
            $table->tinyInteger('status')->default(0);

            $table->string('bg_image')->nullable();
            $table->string('card_thumb')->nullable();
            $table->string('card_title')->nullable();
            $table->string('card_heading')->nullable();
            $table->longText('card_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
