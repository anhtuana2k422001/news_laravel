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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->text('the_comment');
            // $table->unsignedBigInteger('post_id');
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->foreignId('post_id')->constraints()->cascadeOnDelete();
            $table->foreignId('user_id')->constraints()->cascadeOnDelete();

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
