
<div class="card shadow-sm mb-4 question-card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="question-title fw-semibold mb-0">
            Question #1
        </h5>

        <button
            type="button"
            class="btn btn-outline-danger btn-sm remove-question"
            title="Remove Question">

            <i class="bi bi-trash"></i>

        </button>

    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label fw-semibold">
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

                <label class="form-label fw-semibold">
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

                    <label class="form-label fw-semibold">

                        Required

                    </label>

                </div>

            </div>

        </div>

        <div class="options-area mt-4">

            <small class="text-muted">

                Options will appear when you select
                Radio, Checkbox or Dropdown.

            </small>

        </div>

    </div>

</div>
    