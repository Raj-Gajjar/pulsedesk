@extends('layouts.admin.app')

@section('title', 'Create Role')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="mb-1">

                Create Role

            </h2>

            <p class="text-muted mb-0">

                Create a new role and assign permissions.

            </p>

        </div>

        <a
            href="{{ route('roles.index') }}"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h4 class="mb-0">

                Role Information

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('roles.store') }}"
                method="POST">

                @csrf

                @include('admin.roles.form')

            </form>

        </div>

    </div>

</div>

@endsection