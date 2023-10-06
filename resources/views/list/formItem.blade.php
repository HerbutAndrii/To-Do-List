@extends('list.layout')
@section('title', 'Form')
@section('body')                                
    <form class="form" action="{{ isset($id) ? route('item.store', $id) : route('item.update', $item) }}" method="POST">
        @csrf
        @isset($item) @method('PUT') @endisset
        <label>{{ isset($id) ? "New item" : "Edit item" }}</label> <br>
        <input required name="title" type="text" value="{{ isset($item) ? $item->title : '' }}"> <br>
        <button type="submit">{{ isset($id) ? "Create" : "Edit" }}</button>
    </form>
@endsection
