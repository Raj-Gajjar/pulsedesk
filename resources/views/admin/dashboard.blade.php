@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">

    <h2 class="mb-1">

        Dashboard

    </h2>

    <p class="text-muted mb-0">

        Welcome back, {{ auth()->user()->name }} 👋

    </p>

</div>

<div class="row g-4">

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">

                    Total Clients

                </h6>

                <h2 class="fw-bold">

                    {{ $stats['clients'] }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">

                    Total Surveys

                </h6>

                <h2 class="fw-bold">

                    {{ $stats['surveys'] }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">

                    Published Surveys

                </h6>

                <h2 class="fw-bold text-success">

                    {{ $stats['published'] }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">

                    Total Responses

                </h6>

                <h2 class="fw-bold text-primary">

                    {{ $stats['responses'] }}

                </h2>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white">

                <strong>

                    Survey Status

                </strong>

            </div>

            <div class="card-body">

                <table class="table table-borderless mb-0">

                    <tr>

                        <td>Published</td>

                        <td class="text-end">

                            <span class="badge bg-success">

                                {{ $stats['published'] }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>Draft</td>

                        <td class="text-end">

                            <span class="badge bg-secondary">

                                {{ $stats['draft'] }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>Closed</td>

                        <td class="text-end">

                            <span class="badge bg-danger">

                                {{ $stats['closed'] }}

                            </span>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white">

                <strong>

                    Quick Actions

                </strong>

            </div>

            <div class="card-body d-grid gap-2">

                <a
                    href="{{ route('clients.create') }}"
                    class="btn btn-outline-primary">

                    + New Client

                </a>

                <a
                    href="{{ route('surveys.create') }}"
                    class="btn btn-outline-success">

                    + New Survey

                </a>

                <a
                    href="{{ route('responses.index') }}"
                    class="btn btn-outline-dark">

                    View Responses

                </a>

            </div>

        </div>

    </div>

</div>

@endsection