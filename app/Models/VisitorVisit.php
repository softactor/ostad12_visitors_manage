<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorVisit extends Model
{
    protected $fillable = [
        'visitor_site_id',
        'visitor_id',
        'host_user_id',
        'checked_in_by',
        'checked_out_by',
        'purpose',
        'vehicle_no',
        'status',
        'check_in_at',
        'check_out_at',
        'remarks',
    ];

    protected $casts = [
        'check_in_at' => 'datetime',
        'check_out_at' => 'datetime',
    ];
}
