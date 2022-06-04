<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'review',
        'star',
        'id_user',
        'id_booking',
        'id_product',
        'id_salon'
    ];

    /**
     * Get the salon t owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salon()
    {
        return $this->belongsTo(Salon::class, 'id_salon', 'id');
    }

    /**
     * Get the product t the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(ProductSalon::class, 'id_product', 'id');
    }

    /**
     * Get the user t the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
