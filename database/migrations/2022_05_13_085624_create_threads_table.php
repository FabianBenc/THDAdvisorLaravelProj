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
        Schema::create('threads', function (Blueprint $table) {
            $table->id("thread_id");
            $table->string("title");
            $table->string("thread_text");
            $table->unsignedBigInteger('user_id');
            $table->integer("Likes");
            $table->boolean("Pinned");
            $table->timestamps();

            $table->foreign("user_id")->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
};
