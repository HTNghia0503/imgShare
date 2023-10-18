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
        Schema::create('collection_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();

            // Tạo khóa ngoại liên kết với bảng collections
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');

            // Tạo khóa ngoại liên kết với bảng posts
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('collection_post');
    }
};
