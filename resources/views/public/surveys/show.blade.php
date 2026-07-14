@extends('layouts.admin.app')

@section('title', $survey->title)

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-5">

                        <div class="display-6 mb-3">

                            <i class="bi bi-clipboard-check text-primary"></i>

                        </div>

                        <h2 class="fw-bold">

                            {{ $survey->title }}

                        </h2>

                    </div>

                    @if($survey->description)
                        <label class="form-label fw-bold fs-5">
                            Your Description
                        </label>

                        <p class="text-muted mb-4">
                            {{ $survey->description }}
                        </p>

                    @endif

                    <hr>

                    <form
                        action="{{ route('public-surveys.store', $survey) }}"
                        method="POST">

                        @csrf

                        @foreach($survey->questions as $question)

                            <div class="mb-5">

                                <div class="mb-2">

                                    <small class="text-primary fw-semibold">

                                        Question {{ $loop->iteration }}

                                    </small>

                                </div>

                                <label class="form-label fw-bold fs-5">

                                    {{ $question->question }}

                                    @if($question->required)

                                        <span class="text-danger">*</span>

                                    @endif

                                </label>

                                {{-- TEXT --}}
                                @if($question->type == 'text')

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="answers[{{ $question->id }}]"
                                        value="{{ old('answers.'.$question->id) }}"
                                        placeholder="Type your answer...">

                                @endif


                                {{-- TEXTAREA --}}
                                @if($question->type == 'textarea')

                                    <textarea
                                        class="form-control"
                                        rows="4"
                                        name="answers[{{ $question->id }}]"
                                        placeholder="Write your answer...">{{ old('answers.'.$question->id) }}</textarea>

                                @endif


                                {{-- RADIO --}}
                                @if($question->type == 'radio')

                                    @foreach($question->options as $option)

                                        <div class="form-check mb-2">

                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="answers[{{ $question->id }}]"
                                                value="{{ $option->option }}"
                                                {{ old('answers.'.$question->id) == $option->option ? 'checked' : '' }}
                                                >

                                            <label class="form-check-label">

                                                {{ $option->option }}

                                            </label>

                                        </div>

                                    @endforeach

                                @endif


                                {{-- CHECKBOX --}}
                                @if($question->type == 'checkbox')

                                    @foreach($question->options as $option)

                                        <div class="form-check mb-2">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="answers[{{ $question->id }}][]"
                                                value="{{ $option->option }}"
                                                {{ in_array($option->option, old('answers.'.$question->id, [])) ? 'checked' : '' }}>

                                            <label class="form-check-label">

                                                {{ $option->option }}

                                            </label>

                                        </div>

                                    @endforeach

                                @endif


                                {{-- DROPDOWN --}}
                                @if($question->type == 'dropdown')

                                    <select
                                        class="form-select"
                                        name="answers[{{ $question->id }}]">

                                        <option value="">

                                            Choose an option

                                        </option>

                                        @foreach($question->options as $option)

                                            <option
                                                value="{{ $option->option }}"
                                                {{ old('answers.'.$question->id) == $option->option ? 'selected' : '' }}>

                                                {{ $option->option }}

                                            </option>

                                        @endforeach

                                    </select>

                                @endif


                                {{-- RATING --}}
                                @if($question->type == 'rating')

                                    <select
                                        class="form-select"
                                        name="answers[{{ $question->id }}]">

                                        <option value="">

                                            Select your rating

                                        </option>

                                        @for($i = 1; $i <= 5; $i++)

                                            {{-- <option
                                                value="{{ $i }}"
                                                {{ old('answers.'.$question->id) == $i ? 'selected' : '' }}>

                                                {{ $i }}

                                            </option> --}}

                                            <option value="{{ $i }}">

                                                {{ str_repeat('⭐',$i) }}

                                            </option>

                                        @endfor

                                    </select>

                                @endif

                                @error("answers.$question->id")

                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>

                                @enderror

                            </div>

                        @endforeach

                        <hr>

                        <div class="text-end">

                            <button
                                type="submit"
                                class="btn btn-primary w-100 px-5">

                                <i class="bi bi-send me-2"></i>

                                Submit Response

                            </button>

                        </div>
                        <p class="text-center text-muted mt-4 mb-0">

                            Thank you for taking the time to complete this survey.

                        </p>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection