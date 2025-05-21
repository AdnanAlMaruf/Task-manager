@extends('admin.tasks.layout')

@section('content')
<div class="container mt-4">

    {{-- Flash message for success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Task List</h4>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Create Task</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($tasks->isEmpty())
                <div class="p-4 text-center text-muted">No tasks found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th style="width: 250px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description ?? '—' }}</td>
                                    <td>
                                        <span class="badge
                                            @if($task->priority === 'high') bg-danger
                                            @elseif($task->priority === 'medium') bg-warning text-dark
                                            @else bg-success
                                            @endif">
                                            {{ ucfirst($task->priority) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this task?')">
                                                Delete
                                            </button>
                                        </form>

                                        {{-- Show/Hide from client --}}
                                        <form action="{{ route('tasks.toggleClient', $task) }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm {{ $task->show_on_client ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                                {{ $task->show_on_client ? 'Hide from client' : 'Show' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
