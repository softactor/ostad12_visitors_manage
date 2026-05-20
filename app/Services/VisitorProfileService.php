<?php

namespace App\Services;

use App\Models\VisitorProfile;

class VisitorProfileService
{
    public function create($data){
        return VisitorProfile::create($data);

    }
}
