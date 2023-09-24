@extends('list.layout')
@section('title', 'ToDo')
@section('body')
    <h1>My tasks</h1>
    <a href="{{ route('list.create') }}">New task</a>
    <ol>
        @foreach($tasks as $task)
            <form action="{{ route('list.destroy', $task->id) }}">
               @csrf
                <li>
                    {{ $task->title }} <a href="{{ route('list.edit', $task->id) }}">Edit</a> 
                    <button type="submit">Delete</button> <br> <br>
                </li>
            </form>
        @endforeach
    </ol>
@endsection
