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
        Schema::create('aldps', function (Blueprint $table) {
            $table->id();
            $table->string('aldp_id');
            $table->string('manager_id');
            $table->string('year');
            $table->string('comment');
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
        Schema::dropIfExists('aldps');
    }
};
