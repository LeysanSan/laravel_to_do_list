<x-template>

    <h1>{{ $task->title }}</h1>

    <p><strong>Status:</strong> {{ $task->status }}</p>
    <p>{{ $task->description }}</p>

    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>

</x-template>
