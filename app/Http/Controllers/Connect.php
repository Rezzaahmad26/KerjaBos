<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ConnectTopup;

class Connect extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function connect()
    {
        $authUser = auth()->user();
        $connect = ConnectTopup::where('user_id', $authUser->id)
            ->orderByDesc('id')
            ->get();
        return view('front.connect', compact('connect'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
