<?php

namespace App\Http\Controllers\HumanResource;

use App\Models\HumanResource\Departments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        \App\User::canDo('view departments');

        $departments = Departments::all();

        return view('human-resource.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        \App\User::canDo('view departments');

        return view('human-resource.departments.create');
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
        \App\User::canDo('view departments');

        $this->validate($request, [
            'title' => 'required'
        ]);

        $department = new Departments;
        $department->title = request('title');
        $department->description = request('description');
        $department->save();

        return redirect()->route('departments.index')->with('message', 'Department was added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HumanResource\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HumanResource\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $department)
    {
        //
        \App\User::canDo('update departments');
        
        return view('human-resource.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HumanResource\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $department)
    {
        //
        \App\User::canDo('update departments');

        $this->validate($request, [
            'title' => 'required'
        ]);

        $department->title = request('title');
        $department->description = request('description');
        $department->save();

        return redirect()->route('departments.index')->with('message', 'Department was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HumanResource\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $departments)
    {
        //
    }
}
