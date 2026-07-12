@extends('layouts.admin.app')

@section('title', 'Create Role')

@section('content')

<div class="mb-4">

    <h2>Create Role</h2>

</div>

<form
    action="{{ route('roles.store') }}"
    method="POST">

    @include('admin.roles.form')

</form>

@endsection