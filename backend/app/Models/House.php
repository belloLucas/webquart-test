<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'house_title',
        'house_description',
        'rent_price',
        'house_pictures',
        'facilities',
        'amenities',
        'rules',
        'street',
        'neighborhood',
        'city',
        'state',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
