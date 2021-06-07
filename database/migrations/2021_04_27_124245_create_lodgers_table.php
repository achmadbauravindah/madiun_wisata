<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLodgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lodgers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nik', 16)->unique();
            $table->string('password', 64);
            $table->string('email')->unique();
            $table->string('ktp_img')->nullable();
            $table->string('no_wa', 20);
            $table->tinyInteger('jenis_kelamin');
            $table->text('alamat');
            $table->boolean('is_super')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('lodgers');
    }
}
