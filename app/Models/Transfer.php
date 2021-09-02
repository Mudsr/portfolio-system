<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable  = [
        'portfolio_id',
        'old_client_id',
        'new_client_id',
        'plot_id',
        'entry_date'
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }

    public function oldClient()
    {
        return $this->belongsTo(Client::class, 'old_client_id');
    }

    public function newClient()
    {
        return $this->belongsTo(Client::class, 'new_client_id');
    }

}
