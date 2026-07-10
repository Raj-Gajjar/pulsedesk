@extends('layouts.admin.app')

@section('title', 'Add Client')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">

            <h4>Add New Client</h4>

        </div>

        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </div>
            @endif

            <form action="{{ route('clients.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Company Name
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            value="{{ old('company_name') }}"
                            class="form-control @error('company_name') is-invalid @enderror">

                        @error('company_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Contact Person

                        </label>

                        <input
                            type="text"
                            name="contact_person"
                            value="{{ old('contact_person') }}"
                            class="form-control @error('contact_person') is-invalid @enderror">

                        @error('contact_person')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Phone</label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror">

                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Website</label>

                        <input
                            type="url"
                            name="website"
                            value="{{ old('website') }}"
                            class="form-control @error('website') is-invalid
                            @enderror">

                            @error('website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Company Logo</label>

                        <input
                            type="file"
                            name="logo"
                            class="form-control @error('logo') is-invalid  
                            @enderror">

                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Address</label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control
                            @error('address') is-invalid
                            @enderror">
                            {{ old('address') }}

                        </textarea>

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-4">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid
                            @enderror">

                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>

                                Inactive

                            </option>

                        </select>
                        
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <button class="btn btn-primary">

                    Save Client

                </button>

                <a href="{{ route('clients.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

@endsection