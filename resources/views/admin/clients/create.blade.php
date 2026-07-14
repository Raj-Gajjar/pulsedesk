@extends('layouts.admin.app')

@section('title', 'Create Client')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="mb-1">

                Create Client

            </h2>

            <p class="text-muted mb-0">

                Create a new client.

            </p>

        </div>

        <a
            href="{{ route('roles.index') }}"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header  bg-white">

            <h4>Client</h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('clients.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @include('admin.clients.form')

            </form>

        </div>

    </div>

</div>

@endsection