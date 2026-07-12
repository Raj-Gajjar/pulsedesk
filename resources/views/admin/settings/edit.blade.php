@extends('layouts.admin.app')

@section('title', 'Settings')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Settings</h2>

</div>

<form action="{{ route('settings.update') }}"
      method="POST"
      enctype="multipart/form-data">

    @include('admin.settings.form')

</form>

@endsection