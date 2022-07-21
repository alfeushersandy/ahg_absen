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
        Schema::create('absen', function (Blueprint $table) {
            $table->id('id_absen');
            $table->date('Date');
            $table->string('id');
            $table->string('name');
            $table->string('status');
            $table->time('first_check_in');
            $table->time('last_check_out');
            $table->time('duration');
            $table->time('break');
            $table->time('actual');
            $table->time('overtime');
            $table->string('remark');
            $table->string('departemen');
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
        Schema::dropIfExists('absen');
    }
};
