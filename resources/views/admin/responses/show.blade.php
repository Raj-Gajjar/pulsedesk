@extends('layouts.admin.app')

@section('title', 'Response Details')

@section('content')

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>

            <h3 class="fw-bold mb-1">

                Response Details

            </h3>

            <p class="text-muted mb-0">

                View submitted survey information and answers.

            </p>

        </div>

        <a
            href="{{ route('responses.index') }}"
            class="btn btn-secondary border">

            <i class="bi bi-arrow-left me-2"></i>

            Back

        </a>

    </div>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <div class="fw-semibold mb-1">

                    Survey

                </div>

                <div class="fw-semibold">

                    {{ $response->survey->title }}

                </div>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Submitted On</strong>

                <p class="mb-0">

                    {{ $response->created_at->format('d M Y h:i A') }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Respondent</strong>

                <p class="mb-0">

                    {{ $response->respondent_name ?: 'Anonymous' }}

                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Email</strong>

                <p class="mb-0">

                    {{ $response->respondent_email ?: '-' }}

                </p>

            </div>

            <div class="col-md-6">

                <strong>IP Address</strong>

                <p class="mb-0">

                    {{ $response->ip_address }}

                </p>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-header bg-white">

        <h5 class="fw-bold mb-0">

            Survey Answers

        </h5>

    </div>

    <div class="card-body">

        @forelse($response->answers as $answer)

            <div class="border rounded-3 p-3 mb-3 bg-light-subtle">

                <h6 class="fw-semibold mb-3">

                    {{ $loop->iteration }}.
                    {{ $answer->question->question }}

                </h6>

                @php

                    $value = json_decode($answer->answer, true);

                @endphp

                @if(is_array($value))

                    <ul class="mb-0 ps-3">

                        @foreach($value as $item)

                            <li>{{ $item }}</li>

                        @endforeach

                    </ul>

                @else

                    <p class="mb-0">

                        {{ $answer->answer ?: '-' }}

                    </p>

                @endif

            </div>

            @if(!$loop->last)

                <hr>

            @endif

        @empty

            <div class="text-center py-5">

                <i class="bi bi-chat-square-text display-5 text-secondary"></i>

                <h5 class="mt-3">

                    No Answers Found

                </h5>

                <p class="text-muted mb-0">

                    This response doesn't contain any recorded answers.

                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection