<?php

namespace App\Http\Controllers\api\vi\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\admin\VisitorProfileStoreRequest;
use App\Services\VisitorProfileService;

class VisitorProfileController extends Controller
{
    public function __construct(
        private VisitorProfileService $visitorProfileservice,
    ){

    }

    public function store(VisitorProfileStoreRequest $request) {
        // create
        $profile = $this->visitorProfileservice->create($request->validated());

        return response()->json([
            'status'=> 'success',
            'data' => $profile,
            'message' => 'Profile has been created'

        ]);

    }
}
