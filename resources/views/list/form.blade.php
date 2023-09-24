@extends('list.layout')
@section('title', 'Form')
@section('body')                                
    <form action={{ isset($id) ? route('list.update', $id) : route('list.store') }} method="post">
        @csrf
        <label>{{ isset($id) ? "Edit task" : "New task" }}</label>
        <input name="title" type="text" value={{isset($title) ? $title : "" }}>
        <button type="submit">{{ isset($id) ? "Edit" : "Create" }}</button>
    </form>
@endsection
