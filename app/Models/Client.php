<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'address',
        'telephone',
        'id_type',
        'id_no',
        'id_expiry',
    ];

    public function deals()
    {
        return $this->hasMany(Deal::class, 'client_id');
    }
}
