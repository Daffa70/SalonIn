<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSalon extends Model
{
    use HasFactory;
    protected $fillable = [
        'packet_name',
        'desc',
        'price',
        'id_salon'
    ];
}
