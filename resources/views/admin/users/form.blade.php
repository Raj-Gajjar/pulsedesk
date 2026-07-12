@csrf

<div class="card shadow-sm">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">

                Name

            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}">

            @error('name')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}">

            @error('email')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

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

        <div class="row">

            <div class="col-md-6">

                <div class="mb-3">

                    <label class="form-label">

                        Password

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror">

                    @error('password')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                <div class="mb-3">

                    <label class="form-label">

                        Confirm Password

                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control">

                </div>

            </div>

        </div>

        <div class="mb-4">

            <label class="form-label">

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

        <button class="btn btn-primary">

            {{ isset($user) ? 'Update User' : 'Create User' }}

        </button>

        <a
            href="{{ route('users.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</div>