<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            // lapakumkm_id belum dikasih constrained karena nanti kalau refresh bisa tabrakan atau error
            $table->foreignId('lapakumkm_id')->nullable();
            $table->string('nama');
            $table->char('nik', 16)->unique();
            $table->string('password', 64);
            $table->string('email')->unique();
            $table->string('ktp_img')->nullable();
            $table->string('no_wa', 20);
            $table->text('alamat');
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
        Schema::dropIfExists('managers');
    }
}
