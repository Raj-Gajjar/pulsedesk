<div class="row">

    <!-- Company Name -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Company Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="company_name"
            class="form-control @error('company_name') is-invalid @enderror"
            value="{{ old('company_name', $client->company_name ?? '') }}"
            placeholder="Enter company name">

        @error('company_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Contact Person -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Contact Person <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="contact_person"
            class="form-control @error('contact_person') is-invalid @enderror"
            value="{{ old('contact_person', $client->contact_person ?? '') }}"
            placeholder="Enter contact person">

        @error('contact_person')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Email -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Email <span class="text-danger">*</span>
        </label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $client->email ?? '') }}"
            placeholder="Enter email address">

        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Phone -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Phone <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $client->phone ?? '') }}"
            placeholder="Enter phone number">

        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Website -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Website
        </label>

        <input
            type="url"
            name="website"
            class="form-control @error('website') is-invalid @enderror"
            value="{{ old('website', $client->website ?? '') }}"
            placeholder="https://example.com">

        @error('website')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Status -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Status <span class="text-danger">*</span>
        </label>

        <select
            name="status"
            class="form-select @error('status') is-invalid @enderror">

            <option value="1"
                @selected(old('status', $client->status ?? 1) == 1)>
                Active
            </option>

            <option value="0"
                @selected(old('status', $client->status ?? 1) == 0)>
                Inactive
            </option>

        </select>

        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Address -->
    <div class="col-12 mb-3">

        <label class="form-label">
            Address
        </label>

        <textarea
            name="address"
            rows="4"
            class="form-control @error('address') is-invalid @enderror"
            placeholder="Enter address">{{ old('address', $client->address ?? '') }}</textarea>

        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Logo -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Company Logo
        </label>

        <input
            type="file"
            name="logo"
            class="form-control @error('logo') is-invalid @enderror">

        @error('logo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <!-- Logo Preview -->
    @if(isset($client) && $client->logo)

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Current Logo
            </label>

            <div>

                <img
                    src="{{ asset('storage/'.$client->logo) }}"
                    alt="{{ $client->company_name }}"
                    class="img-thumbnail"
                    style="max-width: 150px;">

            </div>

        </div>

    @endif

</div>

<hr>

<div class="d-flex justify-content-end gap-2">

    <a
        href="{{ route('clients.index') }}"
        class="btn btn-secondary">

        Cancel

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        {{ isset($client) ? 'Update Client' : 'Create Client' }}

    </button>

</div>