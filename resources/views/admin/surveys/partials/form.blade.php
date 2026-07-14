   
    <div class="row">

        <!-- Title -->

        <div class="col-12 mb-3">

            <label class="form-label fw-semibold">
                Survey Title <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $survey->title ?? '') }}"
                placeholder="Customer Satisfaction Survey">

            @error('title')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

            @enderror

        </div>

        <!-- Client -->

        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">
                Client <span class="text-danger">*</span>
            </label>

            <select name="client_id" class="form-control @error('title') is-invalid @enderror">

                <option value="">Select Client</option>

                @foreach($clients as $client)

                    <option
                        value="{{ $client->id }}"

                        @selected( old('client_id', $survey->client_id ?? '') == $client->id) >

                        {{ $client->company_name }}

                    </option>

                @endforeach

            </select>

            @error('client_id')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

            @enderror

        </div>

        <!-- Status -->

        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">
                Status
            </label>

            <select name="status" class="form-select">

                <option value="draft"
                    @selected( old('status', $survey->status ?? '') == 'draft')>
                    Draft
                </option>

                <option value="published"
                    @selected( old('status', $survey->status ?? '') == 'published')>
                    Published
                </option>

                <option value="closed"
                    @selected( old('status', $survey->status ?? '') == 'closed')>
                    Closed
                </option>

            </select>

        </div>


        <!-- Description -->

        <div class="col-12 mb-3">

            <label class="form-label fw-semibold">
                Description
            </label>

            <textarea
                name="description"
                rows="3"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Enter survey description">{{ old('description', $survey->description ?? '') }}</textarea>
                
                @error('description')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

                @enderror


        </div>

    </div>



