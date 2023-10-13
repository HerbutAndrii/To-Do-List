@extends('list.layout')
@section('title', 'ToDo')
@section('body')
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <h1>ToDo List</h1>
    <a href="{{ route('task.create') }}">New task</a> <br>
    <ol>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }} 
                <ul>
                    @foreach($task->items as $item)
                        <li>
                            <form action="{{ route('item.destroy', $item) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                {{ $item->title }}
                                <a href="{{ route('item.edit', $item) }}">Edit</a> 
                                <button type="submit">Delete</button> <br> <br>
                            </form>
                        </li>                                
                    @endforeach
                </ul>
                <form action="{{ route('task.destroy', $task) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <a class="addItem" href="{{ route('item.create', $task->id) }}">Add item</a> 
                    <a href="{{ route('task.edit', $task) }}">Edit</a> 
                    <button type="submit">Delete</button> <br> <br>
                </form>
            </li>
        @endforeach
    </ol>
@endsection
