<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class PaiRentPayment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable  = [
        'client_id',
        'deal_id',
        'entry_date',
        'rent_amount',
        'from_date',
        'to_date',
        'comments',
    ];

    public function getRentAmountAttribute($value)
    {
        return number_format($value);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
