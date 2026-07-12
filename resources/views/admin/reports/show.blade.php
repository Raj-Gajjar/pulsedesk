@extends('layouts.admin.app')

@section('title', 'Survey Report')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2>{{ $survey->title }}</h2>

        <p class="text-muted mb-0">
            Client : {{ $survey->client->company_name }}
        </p>

    </div>

    <a href="{{ route('reports.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row text-center">

            <div class="col-md-4">

                <h6>Total Responses</h6>

                <h3>{{ $survey->responses->count() }}</h3>

            </div>

            <div class="col-md-4">

                <h6>Status</h6>

                <h3>{{ ucfirst($survey->status) }}</h3>

            </div>

            <div class="col-md-4">

                <h6>Questions</h6>

                <h3>{{ $survey->questions->count() }}</h3>

            </div>

        </div>

    </div>

</div>

@foreach($survey->questions as $question)

<div class="card shadow-sm mb-4">

    <div class="card-header">

        <strong>
            {{ $loop->iteration }}.
            {{ $question->question }}
        </strong>

    </div>

    <div class="card-body">

        @php
            $answers = $question->answers;
            $totalAnswers = $answers->count();
        @endphp

        {{-- Radio & Dropdown --}}
        @if(in_array($question->type, ['radio', 'dropdown']))

            @foreach($question->options as $option)

                @php

                    $count = $answers
                        ->where('answer', $option->option)
                        ->count();

                    $percentage = $totalAnswers
                        ? round(($count * 100) / $totalAnswers, 1)
                        : 0;

                @endphp

                <div class="mb-3">

                    <div class="d-flex justify-content-between">

                        <span>{{ $option->option }}</span>

                        <span>{{ $count }} ({{ $percentage }}%)</span>

                    </div>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            role="progressbar"
                            style="width: {{ $percentage }}%">

                        </div>

                    </div>

                </div>

            @endforeach

        {{-- Checkbox --}}
        @elseif($question->type == 'checkbox')

            @foreach($question->options as $option)

                @php

                    $count = 0;

                    foreach($answers as $answer){

                        $values = json_decode($answer->answer, true);

                        if(is_array($values) && in_array($option->option, $values)){
                            $count++;
                        }

                    }

                    $percentage = $totalAnswers
                        ? round(($count * 100) / $totalAnswers, 1)
                        : 0;

                @endphp

                <div class="mb-3">

                    <div class="d-flex justify-content-between">

                        <span>{{ $option->option }}</span>

                        <span>{{ $count }} ({{ $percentage }}%)</span>

                    </div>

                    <div class="progress">

                        <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: {{ $percentage }}%">

                        </div>

                    </div>

                </div>

            @endforeach

        {{-- Rating --}}
        @elseif($question->type == 'rating')

            @php

                $average = $totalAnswers
                    ? round($answers->avg(function($answer){
                        return (int) $answer->answer;
                    }),1)
                    : 0;

            @endphp

            <div class="alert alert-warning">

                <strong>Average Rating :</strong>

                {{ $average }} / 5

            </div>

            @for($i = 5; $i >= 1; $i--)

                @php

                    $count = $answers
                        ->where('answer', (string)$i)
                        ->count();

                    $percentage = $totalAnswers
                        ? round(($count * 100) / $totalAnswers, 1)
                        : 0;

                @endphp

                <div class="mb-3">

                    <div class="d-flex justify-content-between">

                        <span>{{ $i }} ⭐</span>

                        <span>{{ $count }} ({{ $percentage }}%)</span>

                    </div>

                    <div class="progress">

                        <div
                            class="progress-bar bg-warning"
                            role="progressbar"
                            style="width: {{ $percentage }}%">

                        </div>

                    </div>

                </div>

            @endfor

        {{-- Text & Textarea --}}
        @else

            @forelse($answers as $answer)

                <div class="border rounded p-3 mb-2">

                    {{ $answer->answer ?: '-' }}

                </div>

            @empty

                <p class="text-muted">

                    No answers found.

                </p>

            @endforelse

        @endif

    </div>

</div>

@endforeach

@endsection