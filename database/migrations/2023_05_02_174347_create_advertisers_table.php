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
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
            $table->string("advertiser_id")->unique();
            $table->string("company_name");
            $table->string("reg_id")->nullable();
            $table->string("vat_id")->nullable();
            $table->string("website_url");
            $table->string('account_email')->unique();
            $table->string('account_password');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country');
            $table->json('documents_path')->nullable();
            $table->json('io_path')->nullable();

            $table->string('acc_mng_first_name');
            $table->string('acc_mng_last_name');
            $table->string('acc_mng_email');
            $table->string('acc_mng_phone')->nullable();
            $table->string('acc_mng_skype')->nullable();
            $table->string('acc_mng_linkedin')->nullable();
            $table->string('country_code')->nullable();

            $table->decimal('revenue_share', $precision = 8, $scale = 2);
            $table->string('payment_terms');
            $table->string('reporting_email');
            $table->string('report_type')->nullable();
            $table->string('api_key')->nullable();
            $table->string('dashboard_path')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('gdrive_email')->nullable();
            $table->string('gdrive_password')->nullable();
            $table->json('report_coloumns')->nullable();
            $table->foreignId('user_id')->nullable(); //user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreignId('team_member_id')->nullable(); //success manager
            $table->foreign('team_member_id')->references('id')->on('users')->onDelete('set null');

            $table->string('billing_email');
            $table->string('payoneer')->nullable();
            $table->string('paypal')->nullable();
            $table->string('bank_beneficiary_name')->nullable();
            $table->string('bank_beneficiary_address')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('bank_iban')->nullable();
            $table->string('bank_swift')->nullable();
            $table->string('bank_currency')->nullable();

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
};
