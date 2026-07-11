@extends('layouts.app')

@section('title', $survey->title)

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="mb-2">
                        {{ $survey->title }}
                    </h2>

                    @if($survey->description)

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

                            <div class="mb-4">

                                <label class="form-label fw-semibold">

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
                                        value="{{ old('answers.'.$question->id) }}">

                                @endif


                                {{-- TEXTAREA --}}
                                @if($question->type == 'textarea')

                                    <textarea
                                        class="form-control"
                                        rows="4"
                                        name="answers[{{ $question->id }}]">{{ old('answers.'.$question->id) }}</textarea>

                                @endif


                                {{-- RADIO --}}
                                @if($question->type == 'radio')

                                    @foreach($question->options as $option)

                                        <div class="form-check">

                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="answers[{{ $question->id }}]"
                                                value="{{ $option->option }}"
                                                {{ old('answers.'.$question->id) == $option->option ? 'checked' : '' }}>

                                            <label class="form-check-label">

                                                {{ $option->option }}

                                            </label>

                                        </div>

                                    @endforeach

                                @endif


                                {{-- CHECKBOX --}}
                                @if($question->type == 'checkbox')

                                    @foreach($question->options as $option)

                                        <div class="form-check">

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

                                            Select

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

                                            Select Rating

                                        </option>

                                        @for($i = 1; $i <= 5; $i++)

                                            <option
                                                value="{{ $i }}"
                                                {{ old('answers.'.$question->id) == $i ? 'selected' : '' }}>

                                                {{ $i }}

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

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Submit Response

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection