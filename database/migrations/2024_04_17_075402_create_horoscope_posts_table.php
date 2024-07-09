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
        Schema::create('horoscope_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('seo_meta_id');
            $table->string('locale')->index();
            $table->text('name')->nullable();
            $table->text('content')->nullable();
            $table->text('love_focus');
            $table->text('lucky_number');
            $table->text('lucky_colour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horoscope_posts');
    }
};
