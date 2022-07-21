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
        Schema::create('master_otc', function (Blueprint $table) {
            $table->id();
            $table->string('departemenName')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('username');
            $table->string('role');
            $table->string('employeeNo')->nullable();
            $table->string('timezone');
            $table->string('digitid')->nullable();
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
        Schema::dropIfExists('master_otc');
    }
};
