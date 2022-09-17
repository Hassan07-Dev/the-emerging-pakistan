<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable ();
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->json('tag_id')->nullable ();
            $table->string ('arthur')->nullable ();
            $table->string ('blog_image')->nullable ();
            $table->text ('title')->nullable ();
            $table->string ('slug')->unique()->nullable ();
            $table->longText ('description')->nullable ();
            $table->longText ('excerpt')->nullable ();
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
        Schema::dropIfExists('blogs');
    }
}
