<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'fee',
        'quarter',
     ];

     public function portfolio()
     {
         return $this->belongsTo(Portfolio::class);
     }

}
