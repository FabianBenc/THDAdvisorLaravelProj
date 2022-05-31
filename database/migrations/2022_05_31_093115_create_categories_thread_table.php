<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_thread', function (Blueprint $table) {
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("thread_id");

            $table->foreign('thread_id')->references('thread_id')->on('threads');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_thread');
    }
};
