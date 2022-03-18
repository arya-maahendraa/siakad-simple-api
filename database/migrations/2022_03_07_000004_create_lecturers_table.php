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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusan');

            $table->string('nip', 18)->unique()->nullable();
            $table->string('nidn', 10)->unique()->nullable();
            $table->string('nidk', 10)->unique()->nullable();
            $table->string('nup', 10)->unique()->nullable();
            $table->boolean('pns')->default(false);
            $table->string('golongan', 8)->nullable();
            $table->string('fungsional', 50)->nullable();

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
        Schema::table('dosen', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['jurusan_id']);
        });

        Schema::dropIfExists('dosen');
    }
};
