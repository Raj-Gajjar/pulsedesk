
<div class="card shadow-sm mb-4 question-card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0 question-title">
            Question #1
        </h5>

        <button
            type="button"
            class="btn btn-sm btn-outline-danger remove-question">

            Remove

        </button>

    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">
                Question
            </label>

            <input
                type="text"
                class="form-control question-input"
                placeholder="Enter your question"
                data-name="questions[INDEX][question]">

        </div>

        <div class="row">

            <div class="col-md-6">

                <label class="form-label">
                    Type
                </label>

                <select
                    class="form-select question-type"
                    data-name="questions[INDEX][type]">

                    <option value="text">Text</option>
                    <option value="textarea">Textarea</option>
                    <option value="radio">Radio</option>
                    <option value="checkbox">Checkbox</option>
                    <option value="dropdown">Dropdown</option>
                    <option value="rating">Rating</option>

                </select>

            </div>

            <div class="col-md-6 d-flex align-items-end">

                <div class="form-check">

                    <input
                        class="form-check-input question-required"
                        type="checkbox"
                        value="1"
                        checked
                        data-name="questions[INDEX][required]">

                    <label class="form-check-label">

                        Required

                    </label>

                </div>

            </div>

        </div>

        <div class="options-area mt-4"></div>

    </div>

</div>
    