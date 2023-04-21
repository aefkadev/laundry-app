<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSubLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sublayanans = SubLayanan::all();
        return view('admin.sublayanan.index', compact('sublayanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sublayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.sublayanan.update');
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
