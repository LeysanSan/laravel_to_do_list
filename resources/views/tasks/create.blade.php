<x-template>

    <h1>Создать Задачу</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Статус</label>
            <select name="status" class="form-select">
                <option value="pending">К выполнению</option>
                <option value="done">Выполнено</option>
            </select>
        </div>

        <button class="btn btn-primary">Сохранить</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отменить</a>
    </form>

</x-template>
