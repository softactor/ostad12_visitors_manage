<?php

namespace App\Http\Controllers\Admin;

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
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //VisitorSite
        $all = $request->all();
        dd($all);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo 'show-'.$id ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        echo 'edit-'.$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
