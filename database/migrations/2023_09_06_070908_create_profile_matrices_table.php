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
        Schema::create('profile_matrices', function (Blueprint $table) {
            $table->id();
            $table->string('matrix_id');
            $table->string('section');
            $table->string('position_title');
            $table->string('competency_id');
            $table->string('competency_name');
            $table->string('jobcode');
            $table->string('level');
            $table->string('jobcode_future');
            $table->string('level_future');
            $table->string('status');
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
        Schema::dropIfExists('profile_matrices');
    }
};
