<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'telephone',
        'email',
        'id_type',
        'id_no',
        'id_expiry',
    ];

    protected $dates = [
        'created_at',
        'protected_at'
    ];
}
