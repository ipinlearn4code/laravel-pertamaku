<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
    protected $fillable = [
        'area_name',
        'is_covered',
        'coverage_quality',
        'notes'
    ];

    protected $casts = [
        'is_covered' => 'boolean'
    ];

    // Scope for covered areas
    public function scopeCovered($query)
    {
        return $query->where('is_covered', true);
    }

    // Scope for quality levels
    public function scopeQuality($query, $quality)
    {
        return $query->where('coverage_quality', $quality);
    }
}
