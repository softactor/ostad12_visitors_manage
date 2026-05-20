<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VisitorSite extends Model
{
    protected $fillable = [
        'name',
        'site_type',
        'location',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function visits():HasMany
    {
        return $this->hasMany(VisitorVisit::class);
    }
}
