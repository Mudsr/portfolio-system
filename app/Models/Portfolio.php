<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Facade\Ignition\QueryRecorder\Query;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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
        'is_current',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function scopeActive($query)
    {
        return $query->where('closing_date', null);
    }

    public static function getCurrentPortfolio()
    {
        $currentPortfolio = self::where('is_current', true)->first();
        if(!$currentPortfolio){
            return self::first();
        }
        return $currentPortfolio;
    }

    public function isClosed()
    {
        if (isset($this->closing_date)) {
            return true;
        }

        return false;
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
