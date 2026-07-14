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
            <i class="bi bi-arrow-left me-2"></i>
            Back
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-header  bg-white">

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


                <div class="border-top mt-5 pt-4">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <button
                            type="button"
                            id="addQuestion"
                            class="btn btn-outline-success">

                            <i class="bi bi-plus-circle me-2"></i>

                            Add Question

                        </button>

                        <div class="d-flex gap-2">

                            <a
                                href="{{ route('surveys.index') }}"
                                class="btn btn-light border">

                                Cancel

                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="bi bi-check-lg me-2"></i>

                                Save Survey

                            </button>

                        </div>

                    </div>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection