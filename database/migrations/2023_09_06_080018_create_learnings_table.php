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
        Schema::create('learnings', function (Blueprint $table) {
            $table->id();
            $table->string('learning_id');
            $table->string('aldp_detail_id');
            $table->string('competency_type');
            $table->string('employee_id');
            $table->string('item_id');
            $table->string('item_id');
            $table->string('started_at');
            $table->string('finished_at');
            $table->string('comment');
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
        Schema::dropIfExists('learnings');
    }
};
