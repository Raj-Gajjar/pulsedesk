@extends('layouts.admin.app')

@section('title', 'Reports')

@section('content')

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <h3 class="fw-bold mb-1">

            Reports

        </h3>

        <p class="text-muted mb-0">

            View survey performance and analytics.

        </p>

    </div>

</div>


<div class="row g-4">

    <div class="col-md-6 col-xl-3">

        <x-admin.stat-card
            title="Total Clients"
            :value="$stats['clients']"
            icon="bi-buildings"
            color="primary"
        />

    </div>

    <div class="col-md-6 col-xl-3">

        <x-admin.stat-card
            title="Total Surveys"
            :value="$stats['surveys']"
            icon="bi-ui-checks-grid"
            color="success"
        />

    </div>

    <div class="col-md-6 col-xl-3">

        <x-admin.stat-card
            title="Responses"
            :value="$stats['responses']"
            icon="bi-chat-left-text"
            color="warning"
        />

    </div>

    <div class="col-md-6 col-xl-3">

        <x-admin.stat-card
            title="Avg / Survey"
            :value="$stats['average_responses']"
            icon="bi-graph-up-arrow"
            color="info"
        />

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">

                    Survey Status

                </h5>

            </div>

            <div class="card-body">

                <table class="table table-hover align-middle mb-0">

                    <tr>
                        <td>Published</td>
                        <td>{{ $stats['published_surveys'] }}</td>
                    </tr>

                    <tr>
                        <td>Draft</td>
                        <td>{{ $stats['draft_surveys'] }}</td>
                    </tr>

                    <tr>
                        <td>Closed</td>
                        <td>{{ $stats['closed_surveys'] }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-12 mt-5">

        <x-admin.table
            title="Survey Reports"
            subtitle="Survey analytics overview">

            <div class="card-header bg-white">

                <strong>

                    Survey Reports

                </strong>

            </div>

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Survey</th>

                            <th>Client</th>

                            <th>Responses</th>

                            <th>Status</th>

                            <th width="150">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($surveys as $survey)

                            <tr>

                                <td>

                                    {{ $surveys->firstItem() + $loop->index }}

                                </td>

                                <td>

                                    <div class="fw-semibold">

                                        {{ $survey->title }}

                                    </div>

                                </td>

                                <td>

                                    <span class="text-muted">

                                        {{ $survey->client->company_name }}

                                    </span>

                                </td>

                                <td>

                                    <span class="badge bg-primary">

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

                                <td>

                                    <a
                                        href="{{ route('reports.show', $survey) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="View Report">

                                        <i class="bi bi-bar-chart-line"></i>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-4">

                                    <div class="text-center py-5">

                                        <i class="bi bi-bar-chart display-5 text-secondary"></i>

                                        <h5 class="mt-3">

                                            No Reports Available

                                        </h5>

                                        <p class="text-muted mb-0">

                                            Reports will appear after surveys receive responses.

                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-3">

                    {{ $surveys->links() }}

                </div>

            </div>

        </x-admin.table>

    </div>

</div>

@endsection