@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('content')

<div class="mb-4">

    <h2>Edit User</h2>

</div>

<form
    action="{{ route('users.update', $user) }}"
    method="POST">

    @csrf

    @method('PUT')

    @include('admin.users.form')

</form>

@endsection