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
        'plot_no',
        'closed_at',
        'renewed_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'renewed_at',
    ];

    public function plot()
    {
        return $this->hasOne(Plot::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function scopeRenewals($query)
    {
        $query->where('renewed_at', '!=',null);
    }

    public function scopeActive($query)
    {
        $query->where('closed_at',null);
    }

    public function scopeInActive($query)
    {
        $query->where('closed_at', '!=',null);
    }
}
