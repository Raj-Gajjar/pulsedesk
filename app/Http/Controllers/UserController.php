<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [

            new Middleware('permission:users.view', only: ['index']),

            new Middleware('permission:users.create', only: ['create', 'store']),

            new Middleware('permission:users.edit', only: ['edit', 'update']),

            new Middleware('permission:users.delete', only: ['destroy']),

        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::with('roles')

            ->when($request->search, function ($query) use ($request) {

                $query->where(function ($q) use ($request) {

                    $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');

                });

            })

            ->when($request->filled('status'), function ($query) use ($request) {

                $query->where('status', $request->status);

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        // $users = User::with('roles');

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = User::create([

                'name' => $request->name,

                'email' => $request->email,

                'password' => Hash::make($request->password),

                'status' => $request->status,

            ]);

            $user->assignRole($request->role);

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User created successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to create user.');

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
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {

            $data = [

                'name' => $request->name,

                'email' => $request->email,

                'status' => $request->status,

            ];

            if ($request->filled('password')) {

                $data['password'] = Hash::make($request->password);

            }

            $user->update($data);

            $user->syncRoles([$request->role]);

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User updated successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to update user.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {

            return back()->with('error', 'You cannot delete your own account.');

        }

        DB::beginTransaction();

        try {

            $user->delete();

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User deleted successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->with('error', 'Unable to delete user.');

        }
    }

}
