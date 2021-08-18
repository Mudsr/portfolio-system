<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
       'area_name',
       'block',
       'property_value',
       'finance_amount',
       'pai_rent',
       'licensed_purpose',
       'application_no',
       'plot_area_size',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
