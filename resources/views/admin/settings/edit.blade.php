@extends('layouts.admin.app')

@section('title', 'Settings')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="mb-1">

                Settings

            </h2>

            <p class="text-muted mb-0">

                Manage your application settings and branding.

            </p>

        </div>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h4 class="mb-0">

                Application Settings

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('settings.update') }}"
                method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                @include('admin.settings.form')

            </form>

        </div>

    </div>

</div>

@endsection