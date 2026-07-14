<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h3 class="fw-bold mb-1">

                    {{ $title }}

                </h3>

                <p class="text-muted mb-0">

                    {{ $subtitle }}

                </p>

            </div>

            <a href="{{ $createRoute }}" class="btn btn-primary">

                <i class="bi bi-plus-lg"></i>

                {{ $buttonText }}

            </a>

        </div>

        <div class="row g-3">

            <div class="col-lg-6">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search"></i>

                    </span>

                    <input
                        type="text"
                        class="form-control border-start-0"
                        placeholder="{{ $searchPlaceholder ?? 'Search...' }}">

                </div>

            </div>

            <div class="col-lg-3">

                <select class="form-select">

                    <option>All Status</option>

                    <option>Active</option>

                    <option>Inactive</option>

                </select>

            </div>

            <div class="col-lg-3">

                <select class="form-select">

                    <option>10 Entries</option>

                    <option>25 Entries</option>

                    <option>50 Entries</option>

                </select>

            </div>

        </div>

    </div>

</div>