<x-template>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Заполните недостающие поля.</strong>
        </div>
    @endif
    <h1>Обновить Задачу</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') ?? $task->title }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Статус</label>
            <select name="status" class="form-select">
                <option value="pending" @selected($task->status === 'pending')>
                    К выполнению
                </option>
                <option value="done" @selected($task->status === 'done')>
                    Выполнено
                </option>
            </select>
        </div>

        <button class="btn btn-primary">Обновить</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отмена</a>
    </form>

</x-template>
