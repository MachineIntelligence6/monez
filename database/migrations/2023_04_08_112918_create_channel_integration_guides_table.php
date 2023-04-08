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
        Schema::create('channel_integration_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Channel::class)->nullable();
            $table->string("c_guideUrl")->nullable();
            $table->string("c_subids")->nullable();
            $table->string("c_dailyCap")->nullable();
            $table->string("c_acceptedGeos")->nullable();
            $table->string("c_searchEngine")->nullable();
            $table->string("c_feedType")->nullable();
            $table->string("c_trafficType")->nullable();
            $table->string("c_trafficSources")->nullable();
            $table->string("c_platform")->nullable();
            $table->string("c_browsers")->nullable();
            $table->string("c_otherRequirements")->nullable();
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
        Schema::dropIfExists('channel_integration_guides');
    }
};
