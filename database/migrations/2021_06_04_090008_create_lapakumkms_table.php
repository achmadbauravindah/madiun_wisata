<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapakumkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapakumkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->nullable()->constrained();
            $table->string('nama', 191);
            $table->string('slug', 191);
            $table->string('kelurahan', 191);
            $table->string('lokasi');
            $table->string('gmap');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('lapakumkms');
    }
}
