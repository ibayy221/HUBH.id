<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'duration_days',
        'description',
        'features',
        'is_popular',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
