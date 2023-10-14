<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->expectsJson()) {
            return User::all();
        }

        return view('list.index', ['tasks' => auth()->user()->tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('list.formTask');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $request->validated();

        $task = new Task();
        $task->title = $request->input('title');
        $task->user()->associate(auth()->user());
        $task->save();
        return redirect(route('task.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('list.formTask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect(route('task.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->items()->delete();
        $task->delete();
        return redirect(route('task.index'));
    }
}
