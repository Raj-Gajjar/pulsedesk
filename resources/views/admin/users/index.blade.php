@extends('layouts.admin.app')

@section('title', 'Users')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Users</h2>

    <a href="{{ route('users.create') }}" class="btn btn-primary">
        + New User
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <form method="GET" class="row mb-4">

            <div class="col-md-8">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search by name or email">

            </div>

            <div class="col-md-2">

                <select name="status" class="form-select">

                    <option value="">All Status</option>

                    <option value="1"
                        {{ request('status') === '1' ? 'selected' : '' }}>

                        Active

                    </option>

                    <option value="0"
                        {{ request('status') === '0' ? 'selected' : '' }}>

                        Inactive

                    </option>

                </select>

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

                    <th>Name</th>

                    <th>Email</th>

                    <th>Status</th>

                    <td> Role </td>

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

                            {{ $user->name }}

                        </td>

                        <td>

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
                                    class="btn btn-sm btn-warning">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('users.destroy', $user) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this user?')"
                                        {{ auth()->id() == $user->id ? 'disabled' : '' }}>

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <h5 class="mb-2">

                                No Users Found

                            </h5>

                            <p class="text-muted mb-3">

                                Create your first user.

                            </p>

                            <a
                                href="{{ route('users.create') }}"
                                class="btn btn-primary">

                                + Create User

                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection