@extends('layouts.admin.app')

@section('title', 'Edit Role')

@section('content')

<div class="mb-4">

    <h2>Edit Role</h2>

</div>

<form
    action="{{ route('roles.update', $role) }}"
    method="POST">

    @csrf

    @method('PUT')

    @include('admin.roles.form')

</form>

@endsection