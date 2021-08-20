<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plot extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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
