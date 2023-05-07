<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'publisher_id',
        'company_name',
        'reg_id',
        'vat_id',
        'website_url',
        'account_email',
        'account_password',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'country',
        'documents_path',
        'io_path',

        'acc_mng_first_name',
        'acc_mng_last_name',
        'acc_mng_email',
        'acc_mng_phone',
        'acc_mng_skype',
        'acc_mng_linkedin',
        'country_code',

        'revenue_share',
        'payment_terms',
        'reporting_email',
        'report_type',
        'api_key',
        'dashboard_path',
        'email',
        'password',
        'gdrive_email',
        'gdrive_password',
        'report_coloumns',
        'user_id',

        'billing_email',
        'payoneer',
        'paypal',
        'bank_beneficiary_name',
        'bank_beneficiary_address',
        'bank_name',
        'bank_address',
        'bank_account_number',
        'bank_routing_number',
        'bank_iban',
        'bank_swift',
        'bank_currency',
    ];

    public function reportColoumns(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
