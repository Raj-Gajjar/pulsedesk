@extends('layouts.admin.app')

@section('title','Create Survey')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="mb-1">Create Survey</h2>
            <p class="text-muted mb-0">
                + Add survey details.
            </p>
        </div>

        <a href="{{ route('surveys.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header">

            <h4>Survey</h4>

        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('surveys.store') }}">
                @csrf

                @include('admin.surveys.partials.form')

                <h4> Questions </h4>

                <div id="questions"> </div>

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
                <button
                    type="submit"
                    class="btn btn-primary w-full mt-4">

                    Save Survey

                </button>


            </form>

        </div>

    </div>

</div>

@endsection