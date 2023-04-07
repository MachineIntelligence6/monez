<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Feed;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds_static_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Feed::class)->nullable();
            $table->string("paramName")->nullable();
            $table->string("paramValue")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('feeds_static_parameters');
    }
};
