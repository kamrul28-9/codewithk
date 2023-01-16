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
        Schema::create('posts', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned()->index();
           $table->integer('category_id')->unsigned()->index()->default(0);
           $table->integer('photo_id')->unsigned()->index();
           $table->string('title');
           $table->text('body');
           $table->timestamps();

           //ban a user with his/her post permanently.
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           // here user_id from the post, id from users table.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
