<?php

namespace App\Models;

use Illuminate\Support\Carbon;
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

    //accessors
    // public function getPropertyValueAttribute($value)
    // {
    //     return number_format($value);
    // }
    // public function getFinanceAmountAttribute($value)
    // {
    //     return number_format($value);
    // }
    // public function getPlotAreaSizeAttribute($value)
    // {
    //     return number_format($value);
    // }

    //relations
    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }

    public function checkDocumentExpiry($days)
    {
        $types = [];
       if( $this->getMedia('pai')->isNotEmpty()) {

            $media = $this->getMedia('pai')->last();
            if(!empty($media->custom_properties) && isset( $media->custom_properties['expiry_date'])) {
                $expiryDate = $media->custom_properties['expiry_date'];

                if( $expiryDate >= Carbon::now() && $expiryDate <=Carbon::now()->addDay($days)){
                    array_push($types,'pai');
                }
            }
       }

       if( $this->getMedia('fire_insurance')->isNotEmpty()) {
            $media = $this->getMedia('fire_insurance')->last();
            if(!empty($media->custom_properties) && isset( $media->custom_properties['expiry_date'])) {

                $expiryDate = $media->custom_properties['expiry_date'];

                if( $expiryDate >= Carbon::now() && $expiryDate <=Carbon::now()->addDay($days)){
                    array_push($types,'fire_insurance');
                }
            }
       }

       if( $this->getMedia('power_of_attorney')->isNotEmpty()) {
            $media = $this->getMedia('power_of_attorney')->last();
            if(!empty($media->custom_properties) && isset( $media->custom_properties['expiry_date'])) {

                $expiryDate = $media->custom_properties['expiry_date'];

                if( $expiryDate >= Carbon::now() && $expiryDate <=Carbon::now()->addDay($days)){
                    array_push($types,'power_of_attorney');
                }
            }
       }
       return $types;
    }
}
