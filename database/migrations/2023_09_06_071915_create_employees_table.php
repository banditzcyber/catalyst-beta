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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('gender');
            $table->string('email');
            $table->string('company');
            $table->string('directorate');
            $table->string('division');
            $table->string('department');
            $table->string('section');
            $table->string('loc');
            $table->string('position');
            $table->string('job_level');
            $table->string('grade');
            $table->string('jobcode');
            $table->string('sm_code');
            $table->string('dm_code');
            $table->string('gm_code');
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
        Schema::dropIfExists('employees');
    }
};
