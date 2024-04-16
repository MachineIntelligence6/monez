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
        Schema::table('revenues', function (Blueprint $table) {
            $table->date('revenue_date')->nullable()->change();
            $table->decimal("coverage")->nullable()->change();
            $table->decimal("ctr")->nullable()->change();
            $table->decimal("rpm")->nullable()->change();
            $table->decimal("monetized_rpm")->nullable()->change();
            $table->decimal("epc")->nullable()->change();
            $table->decimal("gross_revenue")->nullable()->change();
            $table->decimal("net_revenue")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
