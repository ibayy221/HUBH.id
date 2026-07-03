<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'platform',
        'status',
        'short_description',
        'features',
        'thumbnail',
        'screenshots',
    ];

    protected $casts = [
        'features' => 'array',
        'screenshots' => 'array',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
