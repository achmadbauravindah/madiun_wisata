<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->nullable()->constrained();
            $table->foreignId('lapakumkm_id')->nullable()->constrained();
            $table->string('no_kios', 191);
            $table->string('nama', 191);
            $table->string('slug', 191);
            $table->string('foto')->nullable();
            $table->tinyInteger('agree')->default(1);
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
        Schema::dropIfExists('kios');
    }
}
