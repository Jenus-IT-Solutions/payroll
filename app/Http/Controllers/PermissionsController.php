<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class PermissionsController extends Controller
{
    public function __construct() {
        // Resrict this controller to Authenticated users only
        ;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        \App\User::canDo('view permissions', true);

        $permissions = \Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        \App\User::canDo('create permissions', true);

        return view('permissions.create');
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
        \App\User::canDo('create permissions', true);

        $this->validate($request, [
            'name' => 'required|unique:permissions'
        ]);

        \Permission::create(['name' => $request['name']]);

        $role = Role::find(1); // Sync New Permissions to Super Admin
        $role->syncPermissions(\Permission::all());

        session()->flash('message', 'Permission was added successfully');
        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function show($permissions)
    {
        //
        \App\User::canDo('view permissions', true);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function edit($permissions)
    {
        //
        \App\User::canDo('update permissions', true);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permissions)
    {
        //
        \App\User::canDo('update permissions', true);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function destroy($permissions)
    {
        //
        \App\User::canDo('delete permissions', true);

    }
}
