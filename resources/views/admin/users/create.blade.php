@extends('layouts.admin.app')

@section('title', 'Create User')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="mb-1">

                Create User

            </h2>

            <p class="text-muted mb-0">

                + Add a new user and assign a role.

            </p>

        </div>

        <a
            href="{{ route('users.index') }}"
            class="btn btn-secondary ">
            <i class="bi bi-arrow-left me-2"></i>
            Back

        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header">

            <h4 class="mb-0">User Information</h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('users.store') }}"
                method="POST">

                @csrf

                @include('admin.users.form')

            </form>

        </div>

    </div>

</div>

@endsection