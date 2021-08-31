<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Renewal extends Model
{
    use HasFactory;

    protected $fillable  = [
        'portfolio_id',
        'client_id',
        'plot_id',
    ];


    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    function client()
    {
        return $this->belongsTo(Client::class);
    }

}
