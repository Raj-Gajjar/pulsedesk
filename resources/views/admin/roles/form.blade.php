

<div class="mb-4">

    <label class="form-label fw-semibold">

        Role Name <span class="text-danger">*</span>

    </label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $role->name ?? '') }}"
        placeholder="Enter role name">

    <small class="text-muted">

        Examples: Super Admin, Admin, Manager, HR, Support, Staff

    </small>

    @error('name')

        <div class="invalid-feedback">

            {{ $message }}

        </div>

    @enderror

</div>

<div class="mb-3">

    <h5 class="mb-1">

        Permissions

    </h5>

    <p class="text-muted mb-0">

        Select the permissions this role should have.

    </p>

</div>

<div class="row">

    @foreach($permissions as $permission)

        <div class="col-md-4 mb-2">

            <div class="form-check border rounded-3 p-3 h-100 d-flex align-items-center" style="cursor: pointer">

                <input
                    type="checkbox"
                    class="form-check-input me-2 mt-0"
                    id="permission-{{ $permission->id }}"
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

                <label
                    class="form-check-label fw-semibold mb-0"
                    for="permission-{{ $permission->id }}" style="cursor: pointer">

                    {{ $permission->name }}

                </label>

            </div>

        </div>

    @endforeach

</div>

@error('permissions')

    <div class="invalid-feedback d-block mt-2">

        {{ $message }}

    </div>

@enderror

<hr>

<div class="d-flex justify-content-end gap-2">

    <a
        href="{{ route('roles.index') }}"
        class="btn btn-light">

        Cancel

    </a>

    <button
        type="submit"
        class="btn btn-primary">
        <i class="bi bi-check-lg me-2"></i>

        {{ isset($role) ? 'Update Role' : 'Create Role' }}

    </button>

</div>

