@extends('list.layout')
@section('title') ToDo @endsection
@section('body')
    <h1>My tasks</h1>
    <a href="/list/create">New task</a>
    <ul>
        @foreach($tasks as $task)
            <form action="list/delete/{{ $task->id }}">
               @csrf
                <li>
                    {{ $task->title }} <a href="list/edit/{{ $task->id }}">Edit</a> 
                    <button type="submit">Delete</button> <br> <br>
                </li>
            </form>
        @endforeach
    </ul>
@endsection
