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
        Schema::create('channel_searches', function (Blueprint $table) {
            $table->id();
            $table->integer('no_of_redirects')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('latency')->nullable();
            $table->string('device')->nullable();
            $table->string('os')->nullable();
            $table->string('browser')->nullable();
            $table->foreignId('channel_id')->nullable();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('set null');
            $table->foreignId('advertiser_id')->nullable();
            $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('set null');
            $table->foreignId('publisher_id')->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('set null');
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
        Schema::dropIfExists('channel_searches');
    }
};
