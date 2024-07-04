<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('seo_meta_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seo_meta_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('description');
            $table->timestamps();

            $table->unique(['seo_meta_id', 'locale']);
            $table->foreign('seo_meta_id')->references('id')->on('seo_metas')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('seo_meta_translations');
        Schema::dropIfExists('seo_meta');
    }
};
