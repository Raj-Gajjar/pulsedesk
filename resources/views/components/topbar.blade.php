{{-- <nav class="navbar navbar-expand-lg bg-white shadow-sm px-4 py-3">

    <div class="container-fluid">

        <!-- Page Title -->
        <h4 class="mb-0 fw-bold">
            @yield('title', 'Dashboard')
        </h4>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3">

            <div class="text-end">

                <div class="fw-semibold">

                    @if (isset(auth()->user()->name))

                        {{ auth()->user()->name }}      
                                          
                    @endif
                    

                </div>

                <small class="text-muted">

                    Administrator

                </small>

            </div>

            <div class="dropdown">

                <button
                    class="btn btn-light border dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle me-1"></i>

                    Account

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a class="dropdown-item" href="#">

                            <i class="bi bi-person me-2"></i>

                            Profile

                        </a>

                    </li>

                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <li>

                        <form
                            action="{{ route('logout') }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav> --}}