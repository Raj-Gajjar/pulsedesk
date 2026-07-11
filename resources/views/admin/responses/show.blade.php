@extends('layouts.admin.app')

@section('title', 'Response Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Response Details</h2>

    <a href="{{ route('responses.index') }}"
        class="btn btn-secondary">

        Back

    </a>

</div>

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>Survey</strong>

                <p class="mb-0">

                    {{ $response->survey->title }}

                </p>

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

    <div class="card-header">

        <strong>Survey Answers</strong>

    </div>

    <div class="card-body">

        @forelse($response->answers as $answer)

            <div class="mb-4">

                <h6 class="fw-bold">

                    {{ $loop->iteration }}.
                    {{ $answer->question->question }}

                </h6>

                @php

                    $value = json_decode($answer->answer, true);

                @endphp

                @if(is_array($value))

                    <ul class="mb-0">

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

            <p class="text-muted">

                No answers found.

            </p>

        @endforelse

    </div>

</div>

@endsection