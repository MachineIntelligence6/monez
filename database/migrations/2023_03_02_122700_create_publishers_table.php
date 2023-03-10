<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string("dbaId");
            $table->string("companyName");
            $table->string("regId");
            $table->string("vat");
            $table->string("url");
            $table->string('accEmail')->unique();
            $table->string('password');
            $table->string('billEmail');
            $table->string('reportEmail');
            $table->string('address1');
            $table->string('address2');
            $table->string('city_id');
            $table->string('state_id');
            $table->string('country_id');
            $table->unsignedInteger('zipCode');
            $table->string('amFirstName');
            $table->string('amLastName');
            $table->string('amEmail');
            $table->string('amPhone');
            $table->string('amSkype');
            $table->string('amLinkedIn');
            $table->string('agreementDoc');
            $table->unsignedInteger('revSharePer');
            $table->string('paymentTerms');
            $table->unsignedInteger('bank_id');
            $table->string('payoneer');
            $table->string('paypal');
            $table->string('document');
            $table->string('notes');
            $table->date('startDate');
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
        Schema::dropIfExists('publishers');
    }
}
