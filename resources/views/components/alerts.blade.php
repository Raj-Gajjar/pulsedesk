@if(session('success'))

<div class="toast-container position-fixed top-0 end-0 p-4">

    <div class="toast custom-toast success-toast" role="alert">

        <div class="toast-body d-flex align-items-start">

            <div class="toast-icon success">
                <i class="bi bi-check-lg"></i>
            </div>

            <div class="flex-grow-1 ms-3">

                <h6 class="mb-1 fw-bold">
                    Success
                </h6>

                <p class="mb-0 text-muted">
                    {{ session('success') }}
                </p>

            </div>

            <button 
                type="button"
                class="btn-close"
                data-bs-dismiss="toast">
            </button>

        </div>

    </div>

</div>


@endif


@if(session('error'))

<div class="toast-container position-fixed top-0 end-0 p-4">

    <div class="toast custom-toast error-toast" role="alert">

        <div class="toast-body d-flex align-items-start">

            <div class="toast-icon error">
                <i class="bi bi-x-lg"></i>
            </div>

            <div class="flex-grow-1 ms-3">

                <h6 class="mb-1 fw-bold">
                    Error
                </h6>

                <p class="mb-0 text-muted">
                    {{ session('error') }}
                </p>

            </div>

            <button 
                type="button"
                class="btn-close"
                data-bs-dismiss="toast">
            </button>

        </div>

    </div>

</div>

@endif


@if($errors->any())

<div class="toast-container position-fixed top-0 end-0 p-4">

    <div class="toast custom-toast show error-toast border-0 shadow-lg">

        <div class="toast-body d-flex align-items-start">

            <div class="toast-icon error">
                <i class="bi bi-exclamation-lg"></i>
            </div>

            <div class="flex-grow-1 ms-3">

                <h6 class="mb-1 fw-bold">
                    Validation Error
                </h6>

                <ul class="mb-0 ps-3 text-muted">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            <button 
                type="button"
                class="btn-close"
                data-bs-dismiss="toast">
            </button>

        </div>

    </div>

</div>

@endif