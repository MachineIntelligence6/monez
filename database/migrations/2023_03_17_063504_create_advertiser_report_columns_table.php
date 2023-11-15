<?php

use App\Advertiser;
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
        Schema::create('advertiser_report_columns', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Advertiser::class)->nullable();
            $table->foreignIdFor(Publisher::class)->nullable();
            $table->string('channel_id')->nullable();
            $table->string('date')->nullable();
            $table->string('feed')->nullable();
            $table->string('subid')->nullable();
            $table->string('country')->nullable();
            $table->string('geo')->nullable();
            $table->string('report_status')->nullable();          
            $table->string('total_searches')->nullable();
            $table->string('monitized_searches')->nullable();
            $table->string('paid_clicks')->nullable();
            $table->string('revenue')->nullable();
            $table->string('monez_revenue')->nullable();
            $table->string('pub_revenue')->nullable();
            $table->string('latency')->nullable(); 
            $table->string('follow_on_searches')->nullable();
            $table->string('coverage')->nullable();
            $table->string('CTR')->nullable();
            $table->string('RPM')->nullable();     
            $table->string('monetized_RPM')->nullable();
            $table->string('EPC')->nullable();                                   
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
        Schema::dropIfExists('advertiser_report_columns');
    }
};
