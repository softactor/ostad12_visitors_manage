<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorSite;
use Illuminate\Http\Request;

class VisitorSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VisitorSite::all();

        return response()->json([
            "data"=> $data,
            'message' => 'list data',
            'status' => 'success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            "name"=> $request->input("name"),
            "site_type"=> $request->input("site_type"),
            "location"=> $request->input("location"),
            "created_by"=> $request->input("created_by"),
        ];
        VisitorSite::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitorSite $visitorSite)
    {
        //$data = VisitorSite::find($id);

        return response()->json([
            "data"=> $visitorSite,
            'message' => 'Visitor Site data',
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitorSite $visitorSite)
    {

        $visitorSite->name = $request->input('name');
        $visitorSite->site_type = $request->input('site_type');
        $visitorSite->location = $request->input('location');
        $visitorSite->save();

        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitorSite $visitorSite)
    {
        $visitorSite->delete();
    }
}
