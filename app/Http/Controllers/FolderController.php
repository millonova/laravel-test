<?php

namespace App\Http\Controllers;

use App\Models\folder;
use App\Http\Requests\StorefolderRequest;
use App\Http\Requests\UpdatefolderRequest;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorefolderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefolderRequest $request, folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(folder $folder)
    {
        //
    }
}
