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
            $table->date('revenue_date');
            $table->foreignId('advertiser_id')->nullable();
            $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('set null');
            $table->foreignId('feed_id')->nullable();
            $table->string('report_id')->nullable();
            $table->foreign('feed_id')->references('id')->on('feeds')->onDelete('set null');
            $table->foreignId('publisher_id')->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('set null');
            $table->foreignId('channel_id')->nullable();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('set null');
            $table->string('channel')->nullable();
            // $table->string('advertiser')->nullable();
            // $table->string('publisher')->nullable();
            $table->string('sub_id')->nullable();
            $table->string('daily_reports_status')->default('complete');
            $table->string('geo')->nullable();
            $table->integer('total_searches')->nullable();
            $table->integer('monetized_searches')->nullable();
            $table->integer('paid_clicks')->nullable();
            $table->decimal('net_revenue', $precision = 8, $scale = 2)->default(0.00);
            $table->decimal('gross_revenue', $precision = 8, $scale = 2)->default(0.00);
            $table->integer('coverage')->nullable();
            $table->integer('ctr')->nullable();
            $table->integer('rpm')->nullable();
            $table->integer('monetized_rpm')->nullable();
            $table->integer('epc')->nullable();
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
