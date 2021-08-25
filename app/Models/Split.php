<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Split extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'deal_id',
        'old_deal_ids',
     ];

     protected $casts=[
         'old_deal_ids' => 'array'
     ];

     public function portfolio()
     {
         return $this->belongsTo(Portfolio::class);
     }

     public function mergedDeal()
     {
         return $this->belongsTo(Deal::class, 'new_deal_id');
     }

}
