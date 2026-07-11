@extends('layouts.admin.app')

@section('title', 'Surveys')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Surveys</h2>

    <a href="{{ route('surveys.create') }}" class="btn btn-primary">
        + New Survey
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

            <form method="GET" class="row mb-4">

                <div class="col-md-7">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Search Survey">

                </div>

                <div class="col-md-3">

                    <select name="status" class="form-select">

                        <option value="">All Status</option>

                        <option value="draft"
                            {{ request('status') == 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="published"
                            {{ request('status') == 'published' ? 'selected' : '' }}>
                            Published
                        </option>

                        <option value="closed"
                            {{ request('status') == 'closed' ? 'selected' : '' }}>
                            Closed
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

                    <th>Title</th>

                    <th>Client</th>

                    <th>Responses</th>

                    <th>Status</th>

                    <th>Created</th>

                    <th>Public Link</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($surveys as $survey)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $survey->title }}</td>

                        <td>{{ $survey->client->company_name }}</td>

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
                            <a href="{{ route('public-surveys.show', $survey) }}"
                                target="_blank"
                                class="btn btn-sm btn-info">

                                Open Survey

                            </a>
                        </td>

                        <td>
                            <div class="d-flex gap-2">

                                <a href="{{ route('surveys.edit', $survey) }}"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>


                                <form
                                    action="{{ route('surveys.destroy', $survey) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this survey?')">

                                        Delete

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

        <div class="mt-3">

            {{ $surveys->links() }}

        </div>

    </div>

</div>

@endsection