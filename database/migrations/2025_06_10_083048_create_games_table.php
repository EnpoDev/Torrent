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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->text("description");
            $table->text("thunbnail_image");
            $table->text("content_image");
            $table->longText("content");
            $table->longText("content_ytFrameLink")->nullable();
            $table->longText("downloadLink1");
            $table->longText("downloadLink2")->nullable();
            $table->longText("downloadLink3")->nullable();
            $table->longText("downloadLink4")->nullable();
            $table->longText("downloadLink5")->nullable();
            $table->longText("downloadLink6")->nullable();
            $table->string("file_size")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
