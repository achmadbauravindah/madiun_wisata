<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriwisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeriwisatas', function (Blueprint $table) {
            $table->id();
            $table->string('galeri');
            $table->foreignId('wisata_id')->nullable();
            $table->timestamps();


            $table->foreign('wisata_id')
                ->references('id')->on('wisatas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeriwisatas');
    }
}
