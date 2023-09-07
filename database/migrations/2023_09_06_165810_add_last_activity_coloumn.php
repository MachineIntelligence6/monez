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
            $table->timestamp("last_activity_at")->nullable();
        });
        Schema::table('channels', function (Blueprint $table) {
            $table->timestamp("last_activity_at")->nullable();
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
            $table->dropColumn("last_activity_at");
        });
        Schema::table('channels', function (Blueprint $table) {
            $table->dropColumn("last_activity_at");
        });
    }
};
