<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
            $table->string("dbaId");
            $table->string("companyName")->nullable();
            $table->string("regId")->nullable();
            $table->string("vat")->nullable();
            $table->string("url")->nullable();
            $table->string('accEmail')->unique();
            $table->string('password')->nullable();
            $table->string('billEmail')->nullable();
            $table->string('reportEmail')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('country_id')->nullable();
            $table->unsignedInteger('zipCode')->nullable();
            $table->string('amFirstName')->nullable();
            $table->string('amLastName')->nullable();
            $table->string('amEmail')->nullable();
            $table->string('amPhone')->nullable();
            $table->string('amSkype')->nullable();
            $table->string('amLinkedIn')->nullable();
            $table->string('agreementDoc')->nullable();
            $table->unsignedInteger('revSharePer')->nullable();
            $table->string('paymentTerms')->nullable();
            $table->unsignedInteger('bank_id')->nullable();
            $table->string('payoneer')->nullable();
            $table->string('paypal')->nullable();
            $table->string('document')->nullable();
            $table->string('notes')->nullable();
            $table->date('agreement_start_date')->nullable();
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
        Schema::dropIfExists('advertisers');
    }
}

