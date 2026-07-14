<aside class="sidebar">

    <!-- Brand -->

    <div class="sidebar-brand">

        @if(!empty($appSettings->logo))

            <img
                src="{{ asset('storage/'.$appSettings->logo) }}"
                alt="{{ $appSettings->app_name }}"
                class="brand-logo">

        @endif

        <div>

            <h4 class="brand-title">

                {{ $appSettings->app_name ?? 'PulseDesk' }}

            </h4>

            <p class="brand-subtitle">

                Survey Management

            </p>

        </div>

    </div>

    <!-- Main -->

    <span class="sidebar-heading">

        MAIN

    </span>

    <ul class="sidebar-menu">

        <li>

            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="bi bi-grid"></i>

                <span>Dashboard</span>

            </a>

        </li>

        <li>

            <a href="{{ route('clients.index') }}"
                class="{{ request()->routeIs('clients.*') ? 'active' : '' }}">

                <i class="bi bi-buildings"></i>

                <span>Clients</span>

            </a>

        </li>

        <li>

            <a href="{{ route('surveys.index') }}"
                class="{{ request()->routeIs('surveys.*') ? 'active' : '' }}">

                <i class="bi bi-ui-checks-grid"></i>

                <span>Surveys</span>

            </a>

        </li>

        <li>

            <a href="{{ route('responses.index') }}"
                class="{{ request()->routeIs('responses.*') ? 'active' : '' }}">

                <i class="bi bi-chat-left-text"></i>

                <span>Responses</span>

            </a>

        </li>

        <li>

            <a href="{{ route('reports.index') }}"
                class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">

                <i class="bi bi-bar-chart"></i>

                <span>Reports</span>

            </a>

        </li>

    </ul>

    <!-- Administration -->

    <span class="sidebar-heading mt-4">

        ADMINISTRATION

    </span>

    <ul class="sidebar-menu">

        <li>

            <a href="{{ route('users.index') }}"
                class="{{ request()->routeIs('users.*') ? 'active' : '' }}">

                <i class="bi bi-people"></i>

                <span>Users</span>

            </a>

        </li>

        <li>

            <a href="{{ route('roles.index') }}"
                class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">

                <i class="bi bi-person-badge"></i>

                <span>Roles & Permission</span>

            </a>

        </li>


        <li>

            <a href="{{ route('settings.edit') }}"
                class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">

                <i class="bi bi-gear"></i>

                <span>Settings</span>

            </a>

        </li>

    </ul>

    <!-- Footer -->

    <div class="sidebar-footer">

        <small>

            PulseDesk v1.0.0

        </small>

    </div>

</aside>