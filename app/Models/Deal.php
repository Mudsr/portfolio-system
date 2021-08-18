<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_no',
        'plot_no',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function plot()
    {
        return $this->hasOne(Plot::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }


    function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
