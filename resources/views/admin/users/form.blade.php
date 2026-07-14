

    <div class="row">
        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">

                Name <span class="text-danger">*</span>

            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}"
                placeholder="Enter full name">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">

                Email <span class="text-danger">*</span>

            </label>

            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}"
                placeholder="Enter email address">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
    </div>

    <div class="row">

        <div class="col-md-6">

                <label class="form-label fw-semibold">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter password">

                @error('password')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

        </div>

        <div class="col-md-6">

            <div class="mb-3">

               <label class="form-label fw-semibold">

                    Confirm Password

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Confirm password">

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">

                Role

            </label>

            <select
                name="role"
                class="form-select @error('role') is-invalid @enderror">

                <option value="">

                    Select Role

                </option>

                @foreach($roles as $role)

                    <option
                        value="{{ $role->name }}"
                        {{ old(
                            'role',
                            isset($user)
                                ? $user->getRoleNames()->first()
                                : ''
                        ) == $role->name ? 'selected' : '' }}>

                        {{ $role->name }}

                    </option>

                @endforeach

            </select>

            @error('role')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">

                Status

            </label>

            <select
                name="status"
                class="form-select @error('status') is-invalid @enderror">

                <option value="1"
                    {{ old('status', $user->status ?? 1) == 1 ? 'selected' : '' }}>

                    Active

                </option>

                <option value="0"
                    {{ old('status', $user->status ?? 1) == 0 ? 'selected' : '' }}>

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

    <hr>

    <div class="d-flex justify-content-end gap-2">

        <a
            href="{{ route('users.index') }}"
            class="btn btn-light">

            Cancel

        </a>

        <button
            type="submit"
            class="btn btn-primary">

            <i class="bi bi-check-lg me-2"></i>
            {{ isset($user) ? 'Update User' : 'Create User' }}

        </button>

    </div>