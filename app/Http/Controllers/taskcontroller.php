<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','max:255'],
            'description' => ['nullable','string'],
            'is_done' => ['nullable','boolean'],
        ]);

        // checkbox "on" jadi boolean
        $data['is_done'] = (bool) ($request->boolean('is_done'));

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan!');
    }

    public function edit(Task $task)
    {
        return view('edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => ['required','max:255'],
            'description' => ['nullable','string'],
            'is_done' => ['nullable','boolean'],
        ]);

        $data['is_done'] = (bool) ($request->boolean('is_done'));

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus!');
    }

    public function done(Task $task)
    {
        $task->update(['is_done' => ! $task->is_done]);
        return back()->with('success', 'Status task diperbarui.');
    }
}
