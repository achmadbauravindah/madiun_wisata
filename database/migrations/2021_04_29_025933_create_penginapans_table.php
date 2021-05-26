<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenginapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penginapans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lodger_id')->nullable()->constrained();
            $table->string('nama', 191);
            $table->string('slug', 191);
            $table->string('lokasi');
            $table->string('gmap');
            $table->string('harga', 100);
            $table->text('spesifikasi');
            $table->string('gambar')->nullable();
            $table->boolean('agree')->default(false);
            $table->timestamps();

            // Foreign Constraint jika Lodger di hapus
            // $table->foreign('lodger_id')
            //     ->references('id')->on('lodgers')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penginapans');
    }
}
