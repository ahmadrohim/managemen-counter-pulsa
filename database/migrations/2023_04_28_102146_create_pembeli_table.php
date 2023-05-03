<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pulsa_id');
            $table->string('nama');
            $table->string('no_telepon');
            $table->date('tanggal_beli');
            $table->integer('jumlah_beli');
            $table->string('kode_pembeli')->unique();
            $table->date('tenggat_tanggal_beli')->nullable();
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
        Schema::dropIfExists('pembeli');
    }
}
