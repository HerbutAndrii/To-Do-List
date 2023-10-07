@extends('list.layout')
@section('title', 'Form')
@section('body')
    <form class="form" action="{{ isset($task) ? route('task.update', $task) : route('task.store') }}" method="POST">
        @csrf
        @isset($task) @method("PUT") @endisset
        <label>{{ isset($task) ? "Edit task" : "New task" }}</label> <br>
        <input style="@error('title')border: solid red;@enderror" name="title" type="text" value="{{ isset($task) ? $task->title : '' }}"> <br>

        @error('title')
            <div style="color: red">{{ $message }}</div>
        @enderror

        <button type="submit">{{ isset($task) ? "Edit" : "Create" }}</button>
    </form>
@endsection
