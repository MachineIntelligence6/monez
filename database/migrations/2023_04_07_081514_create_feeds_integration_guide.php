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
        Schema::create('feeds_integration_guide', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Feed::class)->nullable();
            $table->string("guideUrl")->nullable();
            $table->string("subids")->nullable();
            $table->string("dailyCap")->nullable();
            $table->string("acceptedGeos")->nullable();
            $table->string("searchEngine")->nullable();
            $table->string("feedType")->nullable();
            $table->string("trafficType")->nullable();
            $table->string("trafficSources")->nullable();
            $table->string("platform")->nullable();
            $table->string("browsers")->nullable();
            $table->string("otherRequirements")->nullable();
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
        Schema::dropIfExists('feeds_integration_guide');
    }
};
