
<div class="card shadow-sm mb-4 question-card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="question-title">
            Question #{{ $index + 1 }}
        </h5>

        <button
            type="button"
            class="btn btn-outline-danger btn-sm remove-question">

            Remove

        </button>

    </div>

    <div class="card-body">

        <!-- Question -->

        <div class="mb-3">

            <label class="form-label">
                Question
            </label>

            <input
                type="text"
                class="form-control question-input"
                name="questions[{{ $index }}][question]"
                value="{{ $question->question }}">

        </div>

        <!-- Type -->

        <div class="row">

            <div class="col-md-6">

                <label class="form-label">

                    Type

                </label>

                <select
                    class="form-select question-type"
                    name="questions[{{ $index }}][type]">

                    <option value="text"
                        @selected($question->type=='text')>
                        Text
                    </option>

                    <option value="textarea"
                        @selected($question->type=='textarea')>
                        Textarea
                    </option>

                    <option value="radio"
                        @selected($question->type=='radio')>
                        Radio
                    </option>

                    <option value="checkbox"
                        @selected($question->type=='checkbox')>
                        Checkbox
                    </option>

                    <option value="dropdown"
                        @selected($question->type=='dropdown')>
                        Dropdown
                    </option>

                    <option value="rating"
                        @selected($question->type=='rating')>
                        Rating
                    </option>

                </select>

            </div>

            <div class="col-md-6 d-flex align-items-end">

                <div class="form-check">

                    <input
                        type="checkbox"
                        class="form-check-input question-required"
                        name="questions[{{ $index }}][required]"
                        value="1"
                        @checked($question->required)>

                    <label class="form-check-label">

                        Required

                    </label>

                </div>

            </div>

        </div>

        <!-- Options -->

        <div class="options-area mt-4">

            @foreach($question->options as $option)

                <div class="input-group mb-2">

                    <input
                        type="text"
                        class="form-control"
                        name="questions[{{ $index }}][options][]"
                        value="{{ $option->option }}">

                </div>

            @endforeach

            <button
                type="button"
                class="btn btn-outline-primary btn-sm add-option">

                + Add Option

            </button>

        </div>

    </div>

</div>

