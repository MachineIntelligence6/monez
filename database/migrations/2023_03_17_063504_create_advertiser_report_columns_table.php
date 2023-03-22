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
            $table->string('date')->nullable();
            $table->string('feed')->nullable();
            $table->string('subid')->nullable();
            $table->string('country')->nullable();
            $table->string('total_searches')->nullable();
            $table->string('monitized_searches')->nullable();
            $table->string('paid_clicks')->nullable();
            $table->string('revenue')->nullable();
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
