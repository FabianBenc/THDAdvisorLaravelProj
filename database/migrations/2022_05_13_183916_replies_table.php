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
        //
        Schema::create('replies', function (Blueprint $table) {
            $table->id("reply_id");
            $table->longText("reply");
            $table->unsignedBigInteger('user_reply_id');
            $table->integer("Likes");
            $table->timestamps();
            $table->unsignedBigInteger("thread_id");

            $table->foreign('thread_id')->references('thread_id')->on('threads')->onDelete('cascade');
            $table->foreign("user_reply_id")->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('replies');
    }
};
