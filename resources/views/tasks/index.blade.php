<x-template>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
        Новая Задача
    </a>

    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    <strong>{{ $task->title }}</strong>
                    <span class="badge bg-secondary">{{ $task->status }}</span>
                </div>

                <div>
                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">Просмотреть</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Изменить</a>

                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $task->id }}">
                        Удалить
                    </button>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal-{{ $task->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Подвердить удаление</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Подтверждаем удаление
                                <strong>{{ $task->title }}</strong>?
                            </div>

                            <div class="modal-footer">
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Отменить
                                    </button>

                                    <button type="submit" class="btn btn-danger">
                                        Подтвердить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>

</x-template>
