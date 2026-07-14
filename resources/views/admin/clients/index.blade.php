@extends('layouts.admin.app')

@section('title', 'Clients')

@section('content')

<x-admin.index-toolbar
    title="Clients"
    subtitle="Manage all client organizations."
    :createRoute="route('clients.create')"
    buttonText="Add Client"
    searchPlaceholder="Search clients..." />
    

<x-admin.table
    title="All Clients"
    subtitle="Manage all registered client organizations">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Logo</th>

                    <th>Company</th>

                    <th>Contact Person</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th>Status</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($clients as $client)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            @if($client->logo)

                                <img
                                    src="{{ asset('storage/' . $client->logo) }}"
                                    alt="{{ $client->company_name }}"
                                    width="45"
                                    height="45"
                                    class="rounded-circle border"
                                    style="object-fit: cover;">

                            @else

                                <span class="text-muted">

                                    No Logo

                                </span>

                            @endif

                        </td>

                        <td>
                             <div class="fw-semibold">

                                {{ $client->company_name }}

                            </div>
                        </td>

                        <td class="text-muted">

                            {{ $client->contact_person }}

                        </td>

                        <td>

                            <a
                                href="mailto:{{ $client->email }}"
                                class="text-decoration-none">

                                {{ $client->email }}

                            </a>

                        </td>

                        <td>{{ $client->phone }}</td>

                        <td>

                            <span class="badge {{ $client->status ? 'bg-success' : 'bg-danger' }}">

                                {{ $client->status ? 'Active' : 'Inactive' }}

                            </span>

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('clients.edit', $client) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form
                                    action="{{ route('clients.destroy', $client) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this client?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center py-5">

                            <h5 class="mb-2">

                                No Clients Found

                            </h5>

                            <p class="text-muted mb-3">

                                Create your first client to get started.

                            </p>

                            <a
                                href="{{ route('clients.create') }}"
                                class="btn btn-primary">

                                + Create Client

                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="px-4 py-3">

            {{ $clients->links() }}

        </div>


</x-admin.table-card>

@endsection