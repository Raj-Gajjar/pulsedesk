   
    <div class="row">

        <!-- Client -->

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Client <span class="text-danger">*</span>
            </label>

            <select name="client_id" class="form-select">

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

                <small class="text-danger">
                    {{ $message }}
                </small>

            @enderror

        </div>

        <!-- Status -->

        <div class="col-md-6 mb-3">

            <label class="form-label">
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

        <!-- Title -->

        <div class="col-12 mb-3">

            <label class="form-label">
                Survey Title <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $survey->title ?? '') }}"
                placeholder="Enter survey title">

            @error('title')

                <small class="text-danger">
                    {{ $message }}
                </small>

            @enderror

        </div>

        <!-- Description -->

        <div class="col-12 mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                class="form-control"
                placeholder="Enter survey description">{{ old('description', $survey->description ?? '') }}</textarea>
                
                @error('description')

                <small class="text-danger">
                    {{ $message }}
                </small>

            @enderror


        </div>

    </div>



