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
        Schema::create('advertiser_report_types', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Advertiser::class)->nullable();
            $table->string('report_type')->nullable();
            $table->string('csv_path')->nullable();
            $table->string('api_key')->nullable();
            $table->string('dashboard_path')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('gdriveEmail')->nullable();
            $table->string('gdrivePassword')->nullable();
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
        Schema::dropIfExists('advertiser_report_types');
    }
};
