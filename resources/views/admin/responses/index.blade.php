@extends('layouts.admin.app')

@section('title', 'Responses')

@section('content')

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <h3 class="fw-bold mb-1">

            Responses

        </h3>

        <p class="text-muted mb-0">

            Review all submitted survey responses.

        </p>

    </div>

</div>


<x-admin.table
    title="All Responses"
    subtitle="Latest survey submissions">

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

                            <div class="fw-semibold">

                                {{ $response->survey->title }}

                            </div>

                        </td>

                        <td>

                            <div class="fw-semibold">

                                {{ $response->respondent_name ?: 'Anonymous' }}

                            </div>

                        </td>

                        <td>

                            <span class="text-muted">

                                {{ $response->respondent_email ?: '-' }}

                            </span>

                        </td>

                        <td>

                            {{ $response->created_at->format('d M Y h:i A') }}

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('responses.show', $response) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="View Response">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <form
                                    action="{{ route('responses.destroy', $response) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Delete Response"
                                        onclick="return confirm('Delete this response?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                           <i class="bi bi-inbox display-5 text-secondary"></i>

                            <h5 class="mt-3 mb-2">

                                No Responses Yet

                            </h5>


                           <p class="text-muted">

                                Survey submissions will appear here once users start responding.

                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="px-4 py-3">

            {{ $responses->links() }}

        </div>

</x-admin.table>

@endsection