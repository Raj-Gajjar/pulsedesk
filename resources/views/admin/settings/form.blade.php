
{{-- general settings --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white py-3">

        <h5 class="mb-1">
            <i class="bi bi-gear me-2 text-primary"></i>
            General Settings
        </h5>

        <small class="text-muted">
            Configure basic application information.
        </small>

    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Application Name
                </label>

                <input
                    type="text"
                    name="app_name"
                    class="form-control @error('app_name') is-invalid @enderror"
                    placeholder="Enter application name"
                    value="{{ old('app_name', $setting->app_name) }}">

                @error('app_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Company Name
                </label>

                <input
                    type="text"
                    name="company_name"
                    class="form-control @error('company_name') is-invalid @enderror"
                    placeholder="Enter company name"
                    value="{{ old('company_name', $setting->company_name) }}">

                @error('company_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Timezone
                </label>

                <input
                    type="text"
                    name="timezone"
                    class="form-control @error('timezone') is-invalid @enderror"
                    placeholder="Asia/Kolkata"
                    value="{{ old('timezone', $setting->timezone) }}">

                @error('timezone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            
        </div>

    </div>

</div>


{{-- survey settings --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white py-3">

        <h5 class="mb-1">
            <i class="bi bi-ui-checks-grid me-2 text-success"></i>
            Survey Settings
        </h5>

        <small class="text-muted">
            Configure survey behaviour.
        </small>

    </div>

    <div class="card-body">

        <!-- Status -->

        <div class="row">

            <div class="col-lg-6">

                <div class="col-md-6 mb-3 ">

                    <label class="form-label">
                        Default Survey Status
                    </label>

                    <select
                        name="survey_default_status"
                        class="form-select">

                        <option value="draft"
                            @selected(old('survey_default_status', $setting->survey_default_status) == 'draft')>

                            Draft

                        </option>

                        <option value="published"
                            @selected(old('survey_default_status', $setting->survey_default_status) == 'published')>

                            Published

                        </option>

                        <option value="closed"
                            @selected(old('survey_default_status', $setting->survey_default_status) == 'closed')>

                            Closed

                        </option>

                    </select>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="border rounded-3 p-3 h-100">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="mb-1">

                                Allow Multiple Responses

                            </h6>

                            <small class="text-muted">

                                Users can submit more than one response.

                            </small>

                        </div>

                        <div class="form-check form-switch">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="allow_multiple_response"
                                value="1"
                                @checked(old('allow_multiple_response', $setting->allow_multiple_response))>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- logo and favicon setting --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <h5 class="mb-1">

            <i class="bi bi-palette me-2 text-warning"></i>

            Branding

        </h5>

        <small class="text-muted">

            Upload your branding assets.

        </small>

    </div>

    <div class="card-body">

        <div class="row g-4">

            <div class="col-md-6">

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

                    @if($setting->logo)

                        <div class="mt-3">

                            <img
                                src="{{ asset('storage/'.$setting->logo) }}"
                                class="img-thumbnail rounded-3 shadow-sm"
                                style="max-height:80px;">

                        </div>

                    @endif

            </div>

            <div class="col-md-6">

            <label class="form-label">
                Favicon
            </label>

            <input
                type="file"
                name="favicon"
                class="form-control @error('favicon') is-invalid @enderror">

            @error('favicon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            @if($setting->favicon)

                <div class="mt-3">

                    <img
                        src="{{ asset('storage/'.$setting->favicon) }}"
                        class="img-thumbnail rounded-3 shadow-sm"
                        style="max-height:48px;">

                </div>

            @endif

            </div>

        </div>

    </div>

</div>


{{-- button --}}
<div class="bg-white border-top py-3 mt-4">

    <div class="d-flex justify-content-end">

        <button
            class="btn btn-primary px-4">

            <i class="bi bi-floppy me-2"></i>

            Save Changes

        </button>

    </div>

</div>
