<div class="bg-dark text-white d-flex flex-column mh-100 shadow" style="width:260px;">

    <!-- Logo -->
    <div class="p-4 border-bottom border-secondary">

        <div class="d-flex align-items-center">

            @if($appSettings->logo)
                <img
                    src="{{ asset('storage/' . $appSettings->logo) }}"
                    alt="Logo"
                    width="45"
                    height="45"
                    class="me-3 rounded">
            @endif

            <div>

                <h4 class="fw-bold mb-0">
                    {{ $appSettings->app_name }}
                </h4>

                {{-- <small class="text-secondary">
                    Survey Management System
                </small> --}}

                @if (isset(auth()->user()->name))

                    <small>
                        <?php
                            echo ucwords(auth()->user()->name);
                        ?>
                    </small>    
                                          
                @endif

            </div>

        </div>

    </div>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column p-3 gap-2">

        @can('dashboard.view')
        <li class="nav-item">

            <a href="{{ route('dashboard') }}"
                class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2 me-2"></i>

                Dashboard

            </a>

        </li>
        @endcan

        @can('clients.view')
        <li class="nav-item">

            <a href="{{ route('clients.index') }}"
                class="nav-link text-white {{ request()->routeIs('clients.*') ? 'active' : '' }}">

                <i class="bi bi-buildings me-2"></i>

                Clients

            </a>

        </li>
        @endcan

        @can('surveys.view')
        <li class="nav-item">

            <a href="{{ route('surveys.index') }}"
                class="nav-link text-white {{ request()->routeIs('surveys.*') ? 'active' : '' }}">

                <i class="bi bi-ui-checks-grid me-2"></i>

                Surveys

            </a>

        </li>
        @endcan

        @can('responses.view')
        <li class="nav-item">

            <a href="{{ route('responses.index') }}"
                class="nav-link text-white {{ request()->routeIs('responses.*') ? 'active' : '' }}">

                <i class="bi bi-chat-left-text me-2"></i>

                Responses

            </a>

        </li>
        @endcan

        @can('reports.view')
        <li class="nav-item">

            <a href="{{ route('reports.index') }}"
                class="nav-link text-white {{ request()->routeIs('reports.*') ? 'active' : '' }}">

                <i class="bi bi-bar-chart-line me-2"></i>

                Reports

            </a>

        </li>
        @endcan

        @can('users.view')
        <li class="nav-item">

            <a href="{{ route('users.index') }}"
                class="nav-link text-white {{ request()->routeIs('users.*') ? 'active' : '' }}">

                <i class="bi bi-people me-2"></i>

                Users

            </a>

        </li>
        @endcan

        @role('Super Admin')
        <li class="nav-item">

            <a href="{{ route('roles.index') }}"
                class="nav-link text-white {{ request()->routeIs('roles.*') ? 'active' : '' }}">

                <i class="bi bi-shield-lock me-2"></i>

                Roles

            </a>

        </li>
        @endrole

        @can('settings.manage')
        <li class="nav-item">

            <a href="{{ route('settings.edit') }}"
                class="nav-link text-white {{ request()->routeIs('settings.*') ? 'active' : '' }}">

                <i class="bi bi-gear me-2"></i>

                Settings

            </a>

        </li>
        @endcan

    </ul>

    <!-- Footer -->
    <div class="mt-auto p-3 border-top border-secondary">

        <small class="text-secondary">

            {{ $appSettings->app_name }} v1.0

        </small>

    </div>

</div>