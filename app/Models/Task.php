<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable  = [
        'portfolio_id',
        'client_id',
        'plot_id',
        'document_type',
        'description',
        'due_date'
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
