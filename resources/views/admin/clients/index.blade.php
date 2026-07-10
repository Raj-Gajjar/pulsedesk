@extends('layouts.admin.app')

@section('title', 'Clients')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Clients</h2>

    <a href="{{ route('clients.create') }}" class="btn btn-primary">
        + Add Client
    </a>

</div>

<div class="card">

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Company</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @if (!empty($clients))
                
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client['id'] }} </td>
                            <td>{{ $client['company_name'] }} </td>
                            <td>{{ $client['contact_person'] }} </td>
                            <td>{{ $client['email'] }} </td>
                            <td>
                                {{ $client['status'] == '1' ? 'Active' : 'Inactive' }} 
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-warning" href="{{ route('clients.edit', $client) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('clients.destroy', $client) }}" method="GET">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <img src="{{ asset('images/empty.svg') }}"
                                width="180">

                            <h5 class="mt-3">

                                No Clients Yet

                            </h5>

                            <p class="text-muted">

                                Start by adding your first client.

                            </p>

                            <a href="{{ route('clients.create') }}"
                            class="btn btn-primary">

                                Add Client

                            </a>

                        </td>

                    </tr>
                @endif

                

            </tbody>

        </table>

    </div>

</div>

@endsection