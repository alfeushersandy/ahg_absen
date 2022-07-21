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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nik');
            $table->string('email');
            $table->string('name');
            $table->string('gender');
            $table->date('birthday');
            $table->string('nationality')->default('Indonesia');
            $table->integer('national-id');
            $table->string('religion')->nullable();
            $table->date('date_joined');
            $table->string('job_title');
            $table->string('departemen');
            $table->string('branch');
            $table->string('level');
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
        Schema::dropIfExists('karyawan');
    }
};
