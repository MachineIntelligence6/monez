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
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->date('activity_date');
            $table->string('channel')->nullable();
            $table->string('advertiser')->nullable();
            $table->string('publisher')->nullable();
            $table->string('feed')->nullable();
            $table->decimal('revenue_share', $precision = 8, $scale = 2)->default(0.00);
            $table->foreignId('channel_id')->nullable();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('set null');
            $table->foreignId('advertiser_id')->nullable();
            $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('set null');
            $table->foreignId('publisher_id')->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('set null');
            $table->foreignId('feed_id')->nullable();
            $table->foreign('feed_id')->references('id')->on('feeds')->onDelete('set null');
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
        Schema::dropIfExists('revenues');
    }
};
