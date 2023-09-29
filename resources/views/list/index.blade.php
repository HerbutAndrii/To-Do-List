@extends('list.layout')
@section('title', 'ToDo')
@section('body')
    <h1>ToDo List</h1>
    <a href="{{ route('list.create') }}">New task</a> <br>
        <ol>
            @foreach($tasks as $task)
                <li>
                    <form action="{{ route('list.destroy', $task->id) }}">
                        {{ $task->title }} 
                        <a href="{{ route('list.edit', $task->id) }}">Edit</a> 
                        @csrf
                        <button type="submit">Delete</button> <br> <br>
                    </form>
                </li>
            @endforeach
        </ol>
@endsection
