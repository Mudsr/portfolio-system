<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'management_fee',
        'minimum_fee_per_quarter',
        'fee_calculation_method',
        'contact_person',
        'contact_number',
        'contact_email',
        'agreement_date',
        'agreement_expiry',
        'update_effective_from',
        'closing_date',
        'closing_reason',
        'closing_remarks',
        'management_fee_last_calculated_at',
    ];


    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
