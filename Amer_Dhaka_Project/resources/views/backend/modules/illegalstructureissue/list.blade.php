@extends('backend.layouts.master')
@section('page_title','Illegal Structure Issue')
@section('page_sub_title', 'List')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Illigal Structure Issue List</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Address</th>
                                <th>Issue Type</th>
                                <th>Description</th>
                                 <th>Status</th>
                                <th>Image</th>
                                <th colspan="3" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($illegalstructureissue as $issue)
                                <tr>
                                    <td>{{ $issue->id }}</td>
                                    <td>{{ $issue->user_id }}</td>
                                    <td>{{ $issue->address }}</td>
                                    <td>{{ $issue->issue_type }}</td>
                                    <td>{{ $issue->description }}</td>
                                    <td>{{ $issue->status }}</td>
                                    <td>
                                        @if ($issue->image)
                                            <img src="{{ asset('uploads/illegalstructureissue/' . $issue->image) }}"
                                                 alt="Issue Image" width="50" height="50" style="object-fit:cover;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('illegalstructureissue.details', $issue->id) }}"
                                           class="btn btn-outline-secondary btn-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                       <a href="{{ route('illegalstructureissue.edit', ['id' => $issue->id, 'name' => Str::slug($issue->issue_type)]) }}"
                                            class="btn btn-outline-primary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                            </a>

                                    </td>
                                    <td class="text-center">
    <form action="{{ route('illegalstructureissue.delete', $issue->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this issue?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">No public illigal structure issues found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <a href="{{route('back.index')}}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

