<nav class="navbar navbar-expand-lg">

    <div class="container-fluid">

        <!-- Left -->

        <div class="d-flex align-items-center gap-3">

            <button class="btn btn-light d-lg-none shadow-sm">

                <i class="bi bi-list fs-4"></i>

            </button>

            <div>

                <h4 class="mb-0 fw-bold">

                    @yield('title', 'Dashboard')

                </h4>

                <small class="text-secondary">

                    Welcome back,
                    {{ auth()->user()->name }}

                </small>

            </div>

        </div>

        <!-- Right -->

        <div class="d-flex align-items-center gap-4">

            <!-- Notification -->

            <button class="btn btn-light position-relative notification shadow-sm">

                <i class="bi bi-bell fs-5"></i>

                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                    3

                </span>

            </button>

            <!-- User -->

            <div class="dropdown">

                <button
                    type="button"
                    class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 shadow-sm pt-1 pb-1"
                    data-bs-toggle="dropdown">

                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6C63FF&color=fff"
                        width="40"
                        height="40"
                        class="rounded-circle">

                    <div class="text-start d-none d-md-block">

                        <div class="fw-semibold">

                            {{ auth()->user()->name }}

                        </div>

                        <small class="text-secondary">

                            {{ auth()->user()->role->name ?? 'User' }}

                        </small>

                    </div>

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow profile-dropdown mt-2">

                    <li>

                        <a
                            class="dropdown-item"
                            href="#">

                            <i class="bi bi-person me-2"></i>

                            My Profile

                        </a>

                    </li>

                    <li>

                        <a
                            class="dropdown-item"
                            href="#">

                            <i class="bi bi-key me-2"></i>

                            Change Password

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

</nav>