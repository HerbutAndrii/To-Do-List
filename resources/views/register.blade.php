@extends('list.layout')
@section('title', 'Registration')
@section('body')
    <form class="form" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <label>
            Name
            <input type="text" name="name"> <br>
        </label>
        @error('name')
            <div style="color: red; font-size: 30px" >{{ $message }}</div>
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
        </label>
        @error('email')
            <div style="color: red; font-size: 30px" >{{ $message }}</div>
        @enderror
        <button type="submit">Sign Up</button>
    </form>
@endsection
