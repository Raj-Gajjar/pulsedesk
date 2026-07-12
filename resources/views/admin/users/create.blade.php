@extends('layouts.admin.app')

@section('title', 'Create User')

@section('content')

    <div class="mb-4">

        <h2>Create User</h2>

    </div>

    <form
        action="{{ route('users.store') }}"
        method="POST">

        @include('admin.users.form')

    </form>

@endsection