<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_salon',
        'no_hp',
        'address',
        'date_register',
        'status_salon',
        'id_user',
        'image_logo',
        'desc'
    ];

    /**
     * Get the user that owns the Salon
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * Get all of the review for the Salon
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function review()
    {
        return $this->hasMany(Review::class, 'id_salon', 'id');
    }
}
