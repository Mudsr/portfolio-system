<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Split extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'plot_id',
        'new_plots_ids',
     ];

     protected $casts=[
         'new_plots_ids' => 'array'
     ];

     public function portfolio()
     {
         return $this->belongsTo(Portfolio::class);
     }

     public function oldPlot()
     {
         return $this->belongsTo(Plot::class, 'plot_id');
     }

     public function newPlots()
     {
         return Plot::whereIn('id', $this->new_plots_ids)->get();
     }

}
