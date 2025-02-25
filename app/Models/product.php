<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'suitable_for',
        'age_group',
        'climate_suitable',
        'rating',
        'vendor',
        'category'
    ];
}

