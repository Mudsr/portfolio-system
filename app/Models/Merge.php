<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merge extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'new_deal_id',
        'old_deal_ids',
     ];

     protected $casts=[
         'old_deal_ids' => 'array'
     ];

     public function portfolio(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(Portfolio::class);
     }

     public function mergedDeal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(Deal::class, 'new_deal_id');
     }

}
