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
        Schema::table('feeds', function (Blueprint $table) {
            $table->integer("daily_search_cap_count")->default(0);
            $table->integer("daily_ip_cap_count")->default(0);
        });

        Schema::table('channels', function (Blueprint $table) {
            $table->integer("daily_search_cap_count")->default(0);
            $table->integer("daily_ip_cap_count")->default(0);
        });

        Schema::table('feeds_integration_guide', function (Blueprint $table) {
            $table->integer("dailyIpCap")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feeds', function (Blueprint $table) {
            $table->dropColumn("daily_ip_cap_count");
            $table->dropColumn("daily_search_cap_count");
        });

        Schema::table('channels', function (Blueprint $table) {
            $table->dropColumn("daily_ip_cap_count");
            $table->dropColumn("daily_search_cap_count");
        });
    }
};
