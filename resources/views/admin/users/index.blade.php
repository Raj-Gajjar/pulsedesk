@extends('layouts.admin.app')

@section('title', 'Users')

@section('content')


<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h3 class="fw-bold mb-1">

                    Users

                </h3>

                <p class="text-muted mb-0">

                    Manage system users and their roles.

                </p>

            </div>

            <a
                href="{{ route('users.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-lg"></i>

                Create User

            </a>

        </div>

        <form method="GET" class="row g-3">

            <div class="col-lg-7">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search"></i>

                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control border-start-0"
                        placeholder="Search users...">

                </div>

            </div>

            <div class="col-lg-3">

                <select
                    name="status"
                    class="form-select">

                    <option value="">All Status</option>

                    <option value="1"
                        @selected(request('status') === '1')>

                        Active

                    </option>

                    <option value="0"
                        @selected(request('status') === '0')>

                        Inactive

                    </option>

                </select>

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
    title="All Users"
    subtitle="Manage every user in PulseDesk">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Status</th>

                    <th>Role</th>

                    <th>Created</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>

                            {{ $users->firstItem() + $loop->index }}

                        </td>

                        <td>

                            <div class="fw-semibold">

                                {{ $user->name }}

                            </div>

                        </td>

                        <td class="text-muted">

                            {{ $user->email }}

                        </td>

                        <td>

                            @if($user->status)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>
                            <span class="badge bg-primary">

                                {{ $user->getRoleNames()->first() ?? '-' }}

                            </span>
                        </td>

                        <td>

                            {{ $user->created_at->format('d M Y') }}

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('users.edit', $user) }}"
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form
                                    action="{{ route('users.destroy', $user) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this user?')"
                                        {{ auth()->id() == $user->id ? 'disabled' : '' }}>

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-5">

                            <h5 class="mb-2">

                                No Users Found

                            </h5>

                            <p class="text-muted mb-3">

                                Create your first user.

                            </p>

                            <a
                                href="{{ route('users.create') }}"
                                class="btn btn-primary">

                                <i class="bi bi-plus-lg"></i>

                                Create User

                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="px-4 py-3">

            {{ $users->links() }}

        </div>

</x-admin.table>

@endsection