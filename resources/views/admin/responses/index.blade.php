@extends('layouts.admin.app')

@section('title', 'Responses')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Responses</h2>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Survey</th>

                    <th>Respondent</th>

                    <th>Email</th>

                    <th>Submitted</th>

                    <th width="170">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($responses as $response)

                    <tr>

                        <td>

                            {{ $responses->firstItem() + $loop->index }}

                        </td>

                        <td>

                            {{ $response->survey->title }}

                        </td>

                        <td>

                            {{ $response->respondent_name ?: 'Anonymous' }}

                        </td>

                        <td>

                            {{ $response->respondent_email ?: '-' }}

                        </td>

                        <td>

                            {{ $response->created_at->format('d M Y h:i A') }}

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('responses.show', $response) }}"
                                    class="btn btn-sm btn-info">

                                    View

                                </a>

                                <form
                                    action="{{ route('responses.destroy', $response) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this response?')">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <h5>

                                No Responses Found

                            </h5>

                            <p class="text-muted mb-0">

                                Responses will appear here after users submit a survey.

                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $responses->links() }}

        </div>

    </div>

</div>

@endsection