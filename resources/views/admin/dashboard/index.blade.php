@extends('layouts.admin.app')

@section('title','Dashboard')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h3 class="mb-1">Welcome back, {{ auth()->user()->name }} 👋</h3>
                <p class="text-muted mb-0">Here's what's happening today.</p>
            </div>
            <div class="text-muted">
                {{ now()->format('d M Y') }}
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">

        @php
            $cards = [
                ['Clients',$totalClients,'primary','bi-buildings'],
                ['Surveys',$totalSurveys,'success','bi-ui-checks-grid'],
                ['Responses',$totalResponses,'warning','bi-chat-left-text'],
                ['Users',$totalUsers,'info','bi-people'],
                ['Published',$publishedSurveys,'dark','bi-check-circle'],
                ['Draft',$draftSurveys,'secondary','bi-pencil-square'],
            ];
        @endphp

        @foreach($cards as [$title,$count,$growth,$icon,])
            <div class="col-xl-4 col-md-6">

            <x-admin.stat-card
                :title="$title"
                :value="$count"
                :icon="$icon"
                :growth="$growth"
            />

        </div>
        @endforeach

    </div>

    <div class="row">

        <div class="col-lg-6 mb-4">
            <x-admin.table
                title="Recent Surveys"
                subtitle="Latest created surveys">
                <table class="table table-hover mb-0 align-middle">
                    <thead>
                    <tr>
                        <th>Title</th>
                        {{-- <th>Client</th> --}}
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($recentSurveys as $survey)
                        <tr>
                            <td>{{ $survey->title }}</td>
                            {{-- <td>{{ $survey->client->company_name }}</td> --}}
                            <td>
                                <span class="badge bg-{{ $survey->status == 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($survey->status) }}
                                </span>
                            </td>
                            <td>{{ $survey->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No surveys found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </x-admin.table>
        </div>

        <div class="col-lg-6 mb-4">
            <x-admin.table
                title="Recent Responses"
                subtitle="Latest Submitted Responses">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                        <tr>
                            <th>Survey</th>
                            {{-- <th>Respondent</th> --}}
                            <th>Submitted</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($recentResponses as $response)
                            <tr>
                                <td>{{ $response->survey->title ?? '-' }}</td>
                                {{-- <td>{{ $response->respondent_name ?? 'Anonymous' }}</td> --}}
                                <td>{{ $response->created_at->format('d M Y h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-4">No responses found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
            </x-admin.table>
        </div>

    </div>

    <div class="row g-3 mb-4">

        <div class="col-lg-4">

            <a href="{{ route('clients.create') }}" class="quick-action-card">

                <div class="quick-action-icon bg-primary-subtle">

                    <i class="bi bi-buildings text-primary"></i>

                </div>

                <div>

                    <h6>Add Client</h6>

                    <small>Create a new client</small>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ route('surveys.create') }}" class="quick-action-card">

                <div class="quick-action-icon bg-success-subtle">

                    <i class="bi bi-ui-checks-grid text-success"></i>

                </div>

                <div>

                    <h6>Create Survey</h6>

                    <small>Design a new survey</small>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ route('reports.index') }}" class="quick-action-card">

                <div class="quick-action-icon bg-warning-subtle">

                    <i class="bi bi-bar-chart-line text-warning"></i>

                </div>

                <div>

                    <h6>View Reports</h6>

                    <small>Check survey analytics</small>

                </div>

            </a>

        </div>

    </div>


</div>
@endsection
