@extends('list.layout')
@section('title', 'Form')
@section('body')                                
    <form class="form" action="{{ isset($id) ? route('item.store', $id) : route('item.update', $item) }}" method="POST">
        @csrf
        @isset($item) @method('PUT') @endisset
        <label>
            {{ isset($id) ? "New item" : "Edit item" }} <br>
            <input name="title" type="text" value="{{ isset($item) ? $item->title : '' }}"> 
        </label> <br>
        @error('title')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <button type="submit">{{ isset($id) ? "Create" : "Edit" }}</button>
    </form>
@endsection
