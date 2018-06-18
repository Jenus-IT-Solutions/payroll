<?php

namespace App\Http\Controllers\HumanResource;

use App\Models\HumanResource\Designations;
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

        $designations = Designations::all();

        return view('human-resource.designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        \App\User::canDo('create designations');

        return view('human-resource.designations.create');
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
        \App\User::canDo('create designations');

        $this->validate($request, [
            'title' => 'required'
        ]);

        $designation = new Designations;
        $designation->title = request('title');
        $designation->description = request('description');
        $designation->save();

        return redirect()->route('designations.index')->with('message', 'Designation was added.');
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
    public function edit(Designations $designation)
    {
        //
        \App\User::canDo('update departments');
        
        return view('human-resource.designations.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HumanResource\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designations $designation)
    {
        //
        \App\User::canDo('update departments');

        $this->validate($request, [
            'title' => 'required'
        ]);

        $designation->title = request('title');
        $designation->description = request('description');
        $designation->save();

        return redirect()->route('designations.index')->with('message', 'Designation was updated.');
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
