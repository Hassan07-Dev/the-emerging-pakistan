<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_testimonials', function (Blueprint $table) {
            $table->id();
            $table->text ('short_comment')->nullable ();
            $table->string ('client_image')->nullable ();
            $table->string ('client_name')->nullable ();
            $table->string ('designation')->nullable ();
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
        Schema::dropIfExists('client_testimonials');
    }
}
