@extends('layouts.admin.app')

@section('title', 'Surveys')

@section('content')

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h3 class="fw-bold mb-1">

                    Surveys

                </h3>

                <p class="text-muted mb-0">

                    Create, publish and manage your surveys.

                </p>

            </div>

            <a
                href="{{ route('surveys.create') }}"
                class="btn btn-primary">

                <i class="bi bi-plus-lg"></i>

                Create Survey

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
                        placeholder="Search surveys...">

                </div>

            </div>

            <div class="col-lg-3">

                <select
                    name="status"
                    class="form-select">

                    <option value="">All Status</option>

                    <option value="draft"
                        @selected(request('status')=='draft')>

                        Draft

                    </option>

                    <option value="published"
                        @selected(request('status')=='published')>

                        Published

                    </option>

                    <option value="closed"
                        @selected(request('status')=='closed')>

                        Closed

                    </option>

                </select>

            </div>

            <div class="col-lg-2">

                <button
                    class="btn btn-primary w-100">

                    Search

                </button>

            </div>

        </form>

    </div>

</div>

<x-admin.table
    title="All Surveys"
    subtitle="Manage every survey in PulseDesk">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Title</th>

                    <th>Client</th>

                    <th>Responses</th>

                    <th>Status</th>

                    <th>Created</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($surveys as $survey)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <div class="fw-semibold">

                                {{ $survey->title }}

                            </div>

                        </td>

                        <td class="text-muted">

                            {{ $survey->client->company_name }}

                        </td>

                        <td>
                            <span class="badge {{ $survey->responses_count ? 'bg-success' : 'bg-secondary' }}">

                                {{ $survey->responses_count }}

                            </span>
                        </td>

                        <td>

                            <span class="badge
                                @if($survey->status == 'published')
                                    bg-success
                                @elseif($survey->status == 'draft')
                                    bg-secondary
                                @else
                                    bg-danger
                                @endif">

                                {{ ucfirst($survey->status) }}

                            </span>

                        </td>

                        <td>{{ $survey->created_at->format('d M Y') }}</td>

                        <td>
                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('public-surveys.show', $survey) }}"
                                    target="_blank"
                                    class="btn btn-sm btn-outline-success">

                                    <i class="bi bi-box-arrow-up-right"></i>

                                </a>

                                <a href="{{ route('surveys.edit', $survey) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('surveys.destroy', $survey) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this survey?')">

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
                                No Surveys Found
                            </h5>

                            <p class="text-muted mb-3">
                                Create your first survey to start collecting feedback.
                            </p>

                            <a href="{{ route('surveys.create') }}"
                            class="btn btn-primary">

                                + Create Survey

                            </a>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="px-4 py-3">

            {{ $surveys->links() }}

        </div>

</x-admin.table>

@endsection