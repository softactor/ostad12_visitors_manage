<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visitor extends Model
{
    protected $fillable = [
        'parent_visitor_id',
        'name',
        'mobile',
        'nid_number',
        'photo',
        'address',
    ];

    public function profile():HasOne{
        return $this->hasOne(VisitorProfile::class);
    }

    public function visits(): HasMany{
        return $this->hasMany(VisitorVisit::class);
    }

    public function latestVisit(): HasOne
    {
        return $this->hasOne(VisitorVisit::class)->latestOfMany();
    }


    public function parentVisitor(): BelongsTo
    {
        return $this->belongsTo(VisitorVisit::class, 'parent_visitor_id ');
    }
    
    public function childVisitor(): HasMany
    {
        return $this->hasMany(VisitorVisit::class, 'parent_visitor_id ');
    }

    
}
