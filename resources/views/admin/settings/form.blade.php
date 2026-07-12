@csrf
@method('PUT')

<div class="card shadow-sm">

    <div class="card-body">

        <h5 class="mb-4">
            General Settings
        </h5>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Application Name
                </label>

                <input
                    type="text"
                    name="app_name"
                    class="form-control @error('app_name') is-invalid @enderror"
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
                    value="{{ old('timezone', $setting->timezone) }}">

                @error('timezone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        <hr>

        <h5 class="mb-4">
            Survey Settings
        </h5>

        <div class="row">

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

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <div class="d-flex justify-content-between align-items-center border rounded p-3">

                    <div>

                        <h6 class="mb-1 fw-semibold">
                            Allow Multiple Responses
                        </h6>

                        <small class="text-muted">
                            Users can submit the survey more than once.
                        </small>

                    </div>

                    <div class="form-check form-switch m-0">

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

        <hr>

        <h5 class="mb-4">
            Branding
        </h5>

        <div class="row">

            <!-- Logo -->
            <div class="col-md-6 mb-4">

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
                            class="img-thumbnail"
                            style="max-height:80px;">

                    </div>

                @endif

            </div>

            <!-- Favicon -->
            <div class="col-md-6 mb-4">

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
                            class="img-thumbnail"
                            style="max-height:48px;">

                    </div>

                @endif

            </div>

        </div>

        <div class="mt-4">

            <button class="btn btn-primary w-full">

                Save Settings

            </button>

        </div>

    </div>

</div>