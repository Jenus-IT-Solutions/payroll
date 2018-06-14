<?php

namespace App\Http\Controllers\HumanResource;

use App\Models\HumanResource as HR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        \App\User::canDo('view designations');

        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HumanResource\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function show(Designations $designations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HumanResource\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function edit(Designations $designations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HumanResource\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designations $designations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HumanResource\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designations $designations)
    {
        //
    }
}
