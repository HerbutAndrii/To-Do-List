<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Task;

class ItemController extends Controller
{
    public function create(string $id) {
        return view('list.formItem', compact('id'));
    }

    public function store(ItemRequest $request, string $id) { 
        $request->validated();

        $task = Task::find($id);
        $item = new Item();
        $item->title = $request->input('title');
        $item->task()->associate($task);
        $item->save();
        return redirect(route('task.index'));
    }

    public function edit(Item $item) {
        return view('list.formItem', compact('item'));
    }

    public function update(ItemRequest $request, Item $item) {
        $item->update($request->validated());
        return redirect(route('task.index'));
    }

    public function destroy(Item $item) {
        $item->delete();
        return redirect(route('task.index'));
    }
}
