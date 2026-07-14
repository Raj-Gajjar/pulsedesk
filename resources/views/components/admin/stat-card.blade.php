<div class="card stat-card h-100">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-start">

            <div>

                <p class="stat-title mb-2">

                    {{ $title }}

                </p>

                <h2 class="stat-value mb-0">

                    {{ $value }}

                </h2>

                @isset($growth)

                    <small class="stat-growth {{ $growth >= 0 ? 'text-success' : 'text-danger' }}">

                        @if($growth >= 0)
                            ↑
                        @else
                            ↓
                        @endif

                        {{ abs((float) $growth) }}%

                        <span class="text-secondary">

                            vs last month

                        </span>

                    </small>

                @endisset

            </div>

            <div class="stat-icon">

                <i class="bi {{ $icon }}"></i>

            </div>

        </div>

    </div>

</div>