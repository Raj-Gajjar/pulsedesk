<div class="card table-card">

    <div class="card-header table-card-header">

        <div>

            <h5 class="mb-1">

                {{ $title }}

            </h5>

            @isset($subtitle)

                <small class="text-muted">

                    {{ $subtitle }}

                </small>

            @endisset

        </div>

        @isset($action)

            <div>

                {{ $action }}

            </div>

        @endisset

    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            {{ $slot }}
        </div>
    </div>

</div>