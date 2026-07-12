@extends('layouts.admin.app')

@section('title', 'Roles')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Roles</h2>

    <a href="{{ route('roles.create') }}" class="btn btn-primary">
        + New Role
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <form method="GET" class="row mb-4">

            <div class="col-md-10">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search Role">

            </div>

            <div class="col-md-2">

                <button class="btn btn-primary w-100">

                    Search

                </button>

            </div>

        </form>

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Role</th>

                    <th>Permissions</th>

                    <th>Users</th>

                    <th>Created</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($roles as $role)

                    <tr>

                        <td>

                            {{ $roles->firstItem() + $loop->index }}

                        </td>

                        <td>

                            {{ $role->name }}

                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $role->permissions->count() }}

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ $role->users->count() }}

                            </span>

                        </td>

                        <td>

                            {{ $role->created_at->format('d M Y') }}

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('roles.edit', $role) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                @if($role->name !== 'Super Admin')

                                <form
                                    action="{{ route('roles.destroy', $role) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this role?')">

                                        Delete

                                    </button>

                                </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <h5>

                                No Roles Found

                            </h5>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $roles->links() }}

        </div>

    </div>

</div>

@endsection