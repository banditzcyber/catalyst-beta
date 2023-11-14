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
        Schema::create('competencies', function (Blueprint $table) {
            $table->id();
            $table->string('competency_id');
            $table->string('competency_area');
            $table->string('competency_type');
            $table->string('competency_name');
            $table->string('competency_bahasa');
            $table->string('description');
            $table->string('description_bahasa');
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
        Schema::dropIfExists('competencies');
    }
};
