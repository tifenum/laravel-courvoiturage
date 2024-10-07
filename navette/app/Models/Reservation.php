<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'navette_id',
        'status',
        'total_price'
    ];

    // Reservation.php
    public function navette()
    {
        return $this->belongsTo(Navette::class, 'navette_id');
    }

}
