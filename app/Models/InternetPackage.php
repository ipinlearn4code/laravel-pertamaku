<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternetPackage extends Model
{
    protected $fillable = [
        'name',
        'speed_mbps', 
        'price',
        'description',
        'features',
        'is_popular',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    // Scope for active packages
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for popular packages
    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    // Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
