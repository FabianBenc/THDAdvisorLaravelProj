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
        Schema::table('threads', function (Blueprint $table) {
            $table->dropColumn("Likes");
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger("reply_id");
            $table->unsignedBigInteger("user_id");
            $table->tinyInteger('is_dislike')->default(0);
            $table->timestamps();

            $table->foreign('reply_id')->references('reply_id')->on('replies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('threads');
        Schema::dropIfExists('likes');
    }
};
