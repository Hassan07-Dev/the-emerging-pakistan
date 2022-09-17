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
            $table->id();
            $table->bigInteger('blog_id')->unsigned()->nullable ();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->string ('name')->nullable ();
            $table->string ('email')->nullable ();
            $table->string ('comment_text')->nullable ();
            $table->bigInteger('comment_id')->unsigned()->nullable ();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->boolean ('approval')->default (false)->nullable ();
            $table->boolean ('status')->default (true)->nullable ();
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
}
