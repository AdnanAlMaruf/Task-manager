<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <hr class="my-4">

                <h3 class="text-lg font-semibold mb-4">Your Assigned Tasks</h3>

                @if($tasks->isEmpty())
                    <div class="text-gray-600">
                        You have no assigned tasks.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 text-sm">
                            <thead class="bg-gray-100 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border">#</th>
                                    <th class="px-4 py-2 border">Title</th>
                                    <th class="px-4 py-2 border">Description</th>
                                    <th class="px-4 py-2 border">Priority</th>
                                    <th class="px-4 py-2 border">Status</th>
                                    <th class="px-4 py-2 border">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ $task->title }}</td>
                                        <td class="border px-4 py-2">{{ $task->description }}</td>
                                        <td class="border px-4 py-2 capitalize">
                                            <span class="px-2 py-1 rounded
                                                @if($task->priority == 'high') bg-red-200 text-red-800
                                                @elseif($task->priority == 'medium') bg-yellow-200 text-yellow-800
                                                @else bg-gray-200 text-gray-800 @endif">
                                                {{ $task->priority }}
                                            </span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            @if($task->is_completed)
                                                <span class="text-green-600">Completed</span>
                                            @else
                                                <span class="text-gray-600">Pending</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ $task->created_at->format('d M Y') }}
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
</x-app-layout>
