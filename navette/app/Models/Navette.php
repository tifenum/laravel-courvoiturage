<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navette extends Model
{
    use HasFactory;

    // Allow mass assignment for these attributes
    protected $fillable = [
        'destination',
        'departure',
        'arrival',
        'vehicle_type',
        'brand',
        'price_per_person',
        'vehicle_price',
        'brand_price',
    ];
}
