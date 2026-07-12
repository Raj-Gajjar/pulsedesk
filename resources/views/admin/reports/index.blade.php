@extends('layouts.admin.app')

@section('title', 'Reports')

@section('content')

<div class="mb-4">

    <h2>Reports Dashboard</h2>

    <p class="text-muted">

        Survey analytics overview

    </p>

</div>

<div class="row g-4">

    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">
                    Total Clients
                </h6>

                <h2>
                    {{ $stats['clients'] }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">
                    Total Surveys
                </h6>

                <h2>
                    {{ $stats['surveys'] }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">
                    Total Responses
                </h6>

                <h2>
                    {{ $stats['responses'] }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6 col-xl-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">
                    Avg Responses / Survey
                </h6>

                <h2>
                    {{ $stats['average_responses'] }}
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-12">

        <div class="card shadow-sm border-0">

            <div class="card-header">

                Survey Status

            </div>

            <div class="card-body">

                <table class="table mb-0">

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

    <div class="col-lg-12">

        <div class="card shadow-sm border-0 mt-4">

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

                                    {{ $survey->title }}

                                </td>

                                <td>

                                    {{ $survey->client->company_name }}

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
                                        class="btn btn-sm btn-primary">

                                        View Report

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-4">

                                    No Surveys Found

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

    </div>

</div>

@endsection