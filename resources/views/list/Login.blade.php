@extends('list.layout')
@section('body')
    <form action="{{route('auth.submit')}}" method="POST">
        @csrf
        <label for="password">Password</label>
        <input id="password" type="password" name="password">
        <label>
            Email
            <input type="email" name="email">
        </label>
        <button type="submit">Login</button>
    </form>
@endsection
