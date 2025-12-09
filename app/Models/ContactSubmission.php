<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'whatsapp',
        'address',
        'package_id',
        'installation_time',
        'notes',
        'newsletter_consent',
        'status'
    ];

    protected $casts = [
        'newsletter_consent' => 'boolean'
    ];

    // Relationship with InternetPackage
    public function package()
    {
        return $this->belongsTo(InternetPackage::class);
    }

    // Scope for different statuses
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }
}
