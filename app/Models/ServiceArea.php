<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
    protected $fillable = [
        'area',
        'name',
        'district',
        'rt',
        'rw',
        'status',
        'description'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    // Scope for active areas
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope for status filter
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
