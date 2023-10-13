@extends("list.layout")
@section('title', 'Welcome')
@section('body')
    <h1>ToDo List</h1>
    <a href="{{ route('auth.loginView') }}">Log In</a>
    <a href="{{ route('auth.registerView') }}">Sign Up</a>
@endsection