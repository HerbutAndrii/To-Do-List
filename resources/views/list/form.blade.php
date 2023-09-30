@extends('list.layout')
@section('title', 'Form')
@section('body')
    <form class="form" action={{ isset($id) ? route('list.update', $id) : route('list.store') }} method="post">
        @csrf
        @method("PUT")
        <label>{{ isset($id) ? "Edit task" : "New task" }}</label> <br>
        <input required name="title" type="text" value={{ isset($title) ? $title : "" }}> <br>
        <button type="submit">{{ isset($id) ? "Edit" : "Create" }}</button>
    </form>
@endsection
