<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
   $data = $request->validate(
    [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string',
    ],
    [
        'title.required' => 'Название задачи обязательно.',
    ]
);

Task::create($data);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача создана!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $task->update($request->only('title', 'description', 'status'));

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача обновлена!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача удалена!');
    }
}
