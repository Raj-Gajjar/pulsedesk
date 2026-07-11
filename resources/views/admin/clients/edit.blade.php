@extends('layouts.admin.app')

@section('title', 'Edit Client')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>Edit Client</h4>

            <a
                href="{{ route('clients.index') }}"
                class="btn btn-secondary">

                Back

            </a>

        </div>

        <div class="card-body">

            <form
                action="{{ route('clients.update', $client) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.clients.form')

            </form>

        </div>

    </div>

</div>

@endsection