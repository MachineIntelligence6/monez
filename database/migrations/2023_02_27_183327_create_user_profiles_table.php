<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('dba')->nullable()->nullable();
            $table->string('company')->nullable();
            $table->string('national_id')->nullable();
            $table->string('vat')->nullable();
            $table->string('website')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('reporting_email')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_postal')->nullable();
            $table->string('country')->nullable();
            $table->string('skype')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('io_agreement')->nullable();
            $table->string('revenue_share')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('payoneer')->nullable();
            $table->string('paypal')->nullable();
            $table->string('document')->nullable();
            $table->text('comment')->nullable();
            $table->date('start_date')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
