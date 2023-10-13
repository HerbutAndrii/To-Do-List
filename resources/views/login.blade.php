@extends('list.layout')
@section('title', 'Login')
@section('body')
    <form class="form" action="{{route('auth.login')}}" method="POST">
        @csrf
        @error('Login')
            <div style="color: red; font-size: 30px">{{ $message }}</div>
        @enderror
        <label>
            Password
            <input type="password" name="password"> <br>
        </label>
        @error('password')
            <div style="color: red; font-size: 30px">{{ $message }}</div>
        @enderror
        <label>
            Email
            <input type="email" name="email"> <br>
            @error('email')
                <div style="color: red; font-size: 30px" >{{ $message }}</div>
            @enderror
        </label>
        <button type="submit">Login</button>
    </form>
@endsection
