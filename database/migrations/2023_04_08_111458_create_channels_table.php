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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Publisher::class)->nullable();
            $table->string("channelId")->unique();
            $table->string("channelpath");
            $table->string("c_staticParameters")->nullable();
            $table->string("c_dynamicParameters")->nullable();
            $table->string("c_assignedFeeds")->nullable();
            $table->integer("c_priorityScore")->nullable();
            $table->string("c_comments")->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('channels');
    }
};
