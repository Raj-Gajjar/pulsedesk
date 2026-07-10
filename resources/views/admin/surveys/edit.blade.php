
@extends('layouts.admin.app')

@section('title', 'Edit Survey')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Edit Survey</h2>
            <p class="text-muted mb-0">
                Update survey details.
            </p>
        </div>

        <a href="{{ route('surveys.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header">

            <h4>Survey </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('surveys.update', $survey) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.surveys.partials.form')

                <hr>

                <h4> Questions </h4>

                <div id="questions">

                    @foreach($survey->questions as $index => $question)

                        @include('admin.surveys.partials.question-card',[
                            'question' => $question,
                            'index' => $index
                        ])

                    @endforeach

                </div>

                <template id="question-template">

                    @include('admin.surveys.partials.question-template')

                </template>

                {{-- Add questions button --}}
                <button
                    type="button"
                    id="addQuestion"
                    class="btn btn-success">

                    + Add Question

                </button>

                {{-- Update survey button --}}
                <button type="submit" class="btn btn-primary w-full mt-4">
                    Update Survey
                </button>

            </form>

        </div>

    </div>

</div>

@endsection