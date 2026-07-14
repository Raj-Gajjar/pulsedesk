@extends('layouts.admin.app')

@section('title', 'Survey Report')

@section('content')

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>

            <h3 class="fw-bold mb-1">

                {{ $survey->title }}

            </h3>

            <p class="text-muted mb-0">

                Client • {{ $survey->client->company_name }}

            </p>

        </div>

        <a
            href="{{ route('reports.index') }}"
            class="btn btn-secondary border">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row g-3 mb-4">

            <div class="col-lg-4">

                <x-admin.stat-card
                    title="Responses"
                    :value="$survey->responses->count()"
                    icon="bi-chat-left-text"
                    color="primary"/>

            </div>

            <div class="col-lg-4">

                <x-admin.stat-card
                    title="Questions"
                    :value="$survey->questions->count()"
                    icon="bi-ui-checks-grid"
                    color="success"/>

            </div>

            <div class="col-lg-4">

                <x-admin.stat-card
                    title="Status"
                    :value="ucfirst($survey->status)"
                    icon="bi-check-circle"
                    color="warning"/>

            </div>

        </div>

    </div>

</div>

@foreach($survey->questions as $question)

<div class="card shadow-sm mb-4">

    <div class="card-header bg-white">

        <h5 class="fw-bold mb-0">

            {{ $loop->iteration }}.

            {{ $question->question }}

        </h5>

    </div>

    <div class="card-body">

        {{-- Question Type Badge --}}
        <div class="mb-3">

            <span class="badge bg-light text-dark border">

                {{ ucfirst($question->type) }}

            </span>

        </div>

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

                    <div class="progress rounded-pill" style="height:8px;">

                        <div
                            class="progress-bar rounded-pill"
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

                    <div class="progress rounded-pill" style="height:8px;">

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

            <div class="alert alert-warning border-0 shadow-sm">

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

                    <div class="progress rounded-pill" style="height:8px;">

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

                <div class="border rounded-3 p-3 mb-3 bg-light">

                    {{ $answer->answer ?: '-' }}

                </div>

            @empty

                <div class="text-center py-5">

                    <i class="bi bi-chat-square display-5 text-secondary"></i>

                    <h5 class="mt-3">

                        No Responses Yet

                    </h5>

                    <p class="text-muted mb-0">

                        This question has not received any answers.

                    </p>

                </div>

            @endforelse

        @endif

    </div>

</div>

@endforeach

@endsection