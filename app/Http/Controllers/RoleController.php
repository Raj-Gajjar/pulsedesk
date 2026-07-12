<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::with(['permissions', 'users'])
            ->when($request->search, function ($query) use ($request) {

                $query->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                );

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        DB::beginTransaction();

        try {

            $role = Role::create([

                'name' => $request->name,
            ]);

            $role->syncPermissions($request->permissions);

            DB::commit();

            return redirect()
                ->route('roles.index')
                ->with('success', 'Role created successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to create role.');

        }
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
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();

        return view('admin.roles.edit', compact('role', 'permissions') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::beginTransaction();

        try {

            $role->update([

                'name' => $request->name,

            ]);

            $role->syncPermissions($request->permissions);

            DB::commit();

            return redirect()
                ->route('roles.index')
                ->with('success', 'Role updated successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to update role.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->name === 'Super Admin') {

            return back()->with(
                'error',
                'Super Admin role cannot be deleted.'
            );

        }

        if ($role->users->count() > 0) {

            return back()->with(
                'error',
                'This role is assigned to users.'
            );

        }

        DB::beginTransaction();

        try {

            $role->delete();

            DB::commit();

            return redirect()
                ->route('roles.index')
                ->with('success', 'Role deleted successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()->with(
                'error',
                'Unable to delete role.'
            );

        }
    }

}
