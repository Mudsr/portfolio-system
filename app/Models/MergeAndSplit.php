<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MergeAndSplit extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'deal_id',
        'old_deal_ids',
        'action_type',
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
         return $this->belongsTo(Deal::class);
     }

     public function scopeMerge($query)
     {
        $query->where('action_type', 'merge');
     }

     public function scopeSplit($query)
     {
        $query->where('action_type', 'split');
     }
}
