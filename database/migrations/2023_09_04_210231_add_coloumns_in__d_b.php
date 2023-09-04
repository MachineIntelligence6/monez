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
        Schema::table('channel_integration_guides', function (Blueprint $table) {
            $table->string("c_dailyIpCap")->nullable();
        });

        Schema::table('channel_searches', function (Blueprint $table) {
            $table->foreignId('feed_id')->nullable();
            $table->foreign('feed_id')->references('id')->on('feeds')->onDelete('set null');
            $table->string("feed")->nullable();
            $table->string("publisher")->nullable();
            $table->string("location")->nullable();
            $table->string("subid")->nullable();
            $table->string("referer")->nullable();
            $table->string("query")->nullable();
            $table->string("alert")->nullable();
            $table->string("geo")->nullable();
            $table->string("screen_resolution")->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_integration_guides', function (Blueprint $table) {
            $table->dropColumn('c_dailyIpCap');
        });

        Schema::table('channel_searches', function (Blueprint $table) {
            $table->dropForeign(['feed_id']);
            $table->dropColumn('feed_id');
            $table->dropColumn('feed');
            $table->dropColumn('publisher');
            $table->dropColumn('location');
            $table->dropColumn('subid');
            $table->dropColumn('referer');
            $table->dropColumn('query');
            $table->dropColumn('alert');
            $table->dropColumn('geo');
            $table->dropColumn('screen_resolution');
        });
    }
};
