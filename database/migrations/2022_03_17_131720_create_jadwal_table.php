<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->string('hari', 20);
            $table->string('jam', 20);
            $table->string('kelas', 10);
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('mata_kuliah');
            $table->timestamps();
        });
        // Schema::table('')
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal', function(Blueprint $table) {
            $table->dropForeign(['matkul_id']);
        });
        Schema::dropIfExists('jadwal');
    }
};
