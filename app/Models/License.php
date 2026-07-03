<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'package_id',
        'license_key',
        'start_date',
        'end_date',
        'status',
        'note',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function scopeExpiringSoon($query)
    {
        return $query->where('end_date', '>=', now()->toDateString())
            ->where('end_date', '<=', now()->addDays(7)->toDateString())
            ->where('status', 'active');
    }

    public function scopeExpired($query)
    {
        return $query->where(function ($q) {
            $q->where('end_date', '<', now()->toDateString())
              ->orWhere('status', 'expired');
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('end_date', '>=', now()->toDateString());
    }

    public static function generateKey(Product $product): string
    {
        $code = strtoupper(Str::limit(preg_replace('/[^A-Za-z0-9]/', '', $product->name), 6, '')) ?: 'APP';

        return 'HUBH-' . $code . '-' . now()->format('Y') . '-' . strtoupper(Str::random(8));
    }
}
