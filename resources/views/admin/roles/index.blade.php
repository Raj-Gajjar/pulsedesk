@extends('layouts.admin.app')

@section('title', 'Roles')

@section('content')

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h3 class="fw-bold mb-1">

                    Roles

                </h3>

                <p class="text-muted mb-0">

                    Manage roles and their permissions.

                </p>

            </div>

            <a
                href="{{ route('roles.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-lg"></i>

                Create Role

            </a>

        </div>

        <form method="GET" class="row g-3">

            <div class="col-lg-10">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search"></i>

                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control border-start-0"
                        placeholder="Search roles...">

                </div>

            </div>

            <div class="col-lg-2">

                <button class="btn btn-primary btn-sm w-100">

                    Search

                </button>

            </div>

        </form>

    </div>

</div>

<x-admin.table
    title="All Roles"
    subtitle="Manage every role in PulseDesk">
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

                             <div class="fw-semibold">

                                {{ $role->name }}

                            </div>

                        </td>

                        <td>

                            <span class="badge rounded-pill bg-primary">

                                {{ $role->permissions->count() }}

                            </span>

                        </td>

                        <td>

                            <span class="badge rounded-pill bg-info">

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
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                @if($role->name !== 'Super Admin')

                                <form
                                    action="{{ route('roles.destroy', $role) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this role?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <h5 class="mb-2">

                                No Roles Found

                            </h5>

                            <p class="text-muted mb-3">

                                Create your first role to manage user permissions.

                            </p>

                            <a
                                href="{{ route('roles.create') }}"
                                class="btn btn-primary">

                                <i class="bi bi-plus-lg me-2"></i>

                                Create Role

                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="px-4 py-3">

            {{ $roles->links() }}

        </div>

</x-admin.table>

@endsection