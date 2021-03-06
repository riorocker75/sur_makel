<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('surat_masuk')) {
            Schema::create('surat_masuk', function (Blueprint $table) {
                $table->bigIncrements('id');
                 $table->text('dinas');
                $table->dateTime('tanggal_masuk')->nullable();
                $table->text('no_surat')->nullable();
                $table->dateTime('tanggal_surat');
                 $table->text('uraian');
               $table->text('status')->comment('1=aktif, 0=non')->nullable();
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('surat_masuk');
    }
}
