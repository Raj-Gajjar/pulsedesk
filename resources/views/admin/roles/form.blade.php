@csrf

<div class="card shadow-sm">

    <div class="card-body">

        <div class="mb-4">

            <label class="form-label">

                Role Name

            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $role->name ?? '') }}">

                <small class="text-muted">
                    Examples: Super Admin, Admin, Manager, HR, Support, Staff
                </small>

            @error('name')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <h5 class="mb-3">

            Permissions

        </h5>

        <div class="row">

            @foreach($permissions as $permission)

                <div class="col-md-4 mb-2">

                    <div class="form-check">

                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="permissions[]"
                            value="{{ $permission->name }}"

                            {{ in_array(
                                $permission->name,
                                old(
                                    'permissions',
                                    isset($role)
                                        ? $role->permissions->pluck('name')->toArray()
                                        : []
                                )
                            ) ? 'checked' : '' }}>

                        <label class="form-check-label">

                            {{ $permission->name }}

                        </label>

                    </div>

                </div>

            @endforeach

        </div>

        @error('permissions')

            <div class="text-danger mt-2">

                {{ $message }}

            </div>

        @enderror

        <hr>

        <button class="btn btn-primary">

            {{ isset($role) ? 'Update Role' : 'Create Role' }}

        </button>

        <a
            href="{{ route('roles.index') }}"
            class="btn btn-secondary">

            Cancel

        </a>

    </div>

</div>