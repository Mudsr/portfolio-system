<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'client_id',
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
