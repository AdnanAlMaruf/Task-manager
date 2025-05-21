@extends('admin.tasks.layout')

@section('content')
<div class="container mt-4">
    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">You are an Agent!</h4>

            <h5>Your Assigned Tasks:</h5>

            @if($tasks->isEmpty())
                <div class="alert alert-info mt-3">
                    You have no assigned tasks at the moment.
                </div>
            @else
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $index => $task)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    <span class="badge
                                        @if($task->priority === 'high') bg-danger
                                        @elseif($task->priority === 'medium') bg-warning
                                        @else bg-secondary @endif">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                </td>
                                <td>
                                    @if($task->is_completed)
                                        <span class="badge bg-success">Completed</span>
                                    @else
                                        <span class="badge bg-secondary">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $task->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>
@endsection
