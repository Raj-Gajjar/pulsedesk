<div class="bg-dark text-white d-flex flex-column h-100 shadow" style="width:260px;">

    <!-- Logo -->
    <div class="p-4 border-bottom border-secondary">

        <h3 class="fw-bold mb-0">
            PulseDesk
        </h3>

        <small class="text-secondary">
            Survey Management System
        </small>

    </div>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column p-3 gap-2">

        <li class="nav-item">

            <a href="{{ route('dashboard') }}"
                class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2 me-2"></i>

                Dashboard

            </a>

        </li>

        <li class="nav-item">

            <a href="{{ route('clients.index') }}"
                class="nav-link text-white {{ request()->routeIs('clients.*') ? 'active' : '' }}">

                <i class="bi bi-buildings me-2"></i>

                Clients

            </a>

        </li>

        <li class="nav-item">

            <a href="{{ route('surveys.index') }}"
                class="nav-link text-white {{ request()->routeIs('surveys.*') ? 'active' : '' }}">

                <i class="bi bi-ui-checks-grid me-2"></i>

                Surveys

            </a>

        </li>

        <li class="nav-item">

            <a href="{{ route('responses.index') }}"
                class="nav-link text-white {{ request()->routeIs('responses.*') ? 'active' : '' }}">

                    <i class="bi bi-chat-left-text me-2"></i>

                    Responses

            </a>

        </li>

        <li class="nav-item">

            <a href="#"
                class="nav-link text-white">

                <i class="bi bi-bar-chart-line me-2"></i>

                Reports

            </a>

        </li>

        <li class="nav-item">

            <a href="#"
                class="nav-link text-white">

                <i class="bi bi-people me-2"></i>

                Users

            </a>

        </li>

        <li class="nav-item">

            <a href="#"
                class="nav-link text-white">

                <i class="bi bi-shield-lock me-2"></i>

                Roles & Permissions

            </a>

        </li>

        <li class="nav-item">

            <a href="#"
                class="nav-link text-white">

                <i class="bi bi-gear me-2"></i>

                Settings

            </a>

        </li>

    </ul>

    <!-- Footer -->
    <div class="mt-auto p-3 border-top border-secondary">

        <small class="text-secondary">

            PulseDesk v1.0

        </small>

    </div>

</div>