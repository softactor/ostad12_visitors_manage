<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitorProfile extends Model
{
    protected $fillable = [
        "visitor_id",
        "prefession",
        "emergency_contact",
        "dob",
    ];

    public function visitor():BelongsTo{
        return $this->belongsTo(Visitor::class);
    }
}
