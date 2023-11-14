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
        Schema::create('aldp_details', function (Blueprint $table) {
            $table->id();
            $table->string('aldp_detail_id');
            $table->string('aldp_id');
            $table->string('competency_type');
            $table->string('item_id');
            $table->string('item_name');
            $table->string('planned_month');
            $table->string('planned_week');
            $table->string('remarks');
            $table->string('status_detail');
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
        Schema::dropIfExists('aldp_details');
    }
};
