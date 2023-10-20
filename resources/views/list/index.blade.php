@extends('list.layout')
@section('title', 'ToDo')
@section('body')
    @if($user->avatar)
        <img src="{{ 'storage/avatars/User'.$user->id }}" alt="{{ $user->name }}" class="avatar">
    @endisset
    <div style="color: white; font-size: 30px; margin-bottom: 20px">{{ $user->name }}</div>
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <h1>ToDo List</h1>
    <a href="{{ route('task.create') }}">New task</a> <br>
    <ol>
        @foreach($user->tasks as $task)
            <li>
                <div style="color: <?= $task->color ?>">{{ $task->title }}</div> 
                <ul>
                    @foreach($task->items as $item)
                        <li>
                            <form action="{{ route('item.destroy', $item) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <span style="color: <?= $item->color ?>">{{ $item->title }}</spam>
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
