<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('book-id');
            $table->text('comment');
            $table->unsignedBigInteger('user-id');
            
            $table->foreign('book-id', 'book-coment')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user-id', 'user-comment')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
}
