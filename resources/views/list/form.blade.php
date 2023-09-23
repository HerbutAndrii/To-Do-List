@extends('list.layout')
@section('title') Form @endsection
@section('body')                                
    <form 
        @if(isset($id))
            action="/list/edit/{{ $id }}/new"
        @else 
            action="/list/create/new"
        @endif
        method="post">
        @csrf
        <label>{{ isset($id) ? "Edit task" : "New task" }}</label>
        <input name="title" type="text" 
        @if(isset($title))
            value="{{ $title }}">
        @else
            placeholder="Title">
        @endif
        <button type="submit">{{ isset($id) ? "Edit" : "Create" }}</button>
    </form>
@endsection
