@extends('layouts.admin.app')

@section('title', 'Create Client')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>Create Client</h4>

            <a
                href="{{ route('clients.index') }}"
                class="btn btn-secondary">

                Back

            </a>

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