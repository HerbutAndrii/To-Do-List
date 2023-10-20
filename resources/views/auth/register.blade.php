@extends('list.layout')
@section('title', 'Registration')
@section('body')
    <form class="form" action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('code')
            <div style="color: red; font-size: 30px" >{{ $message }}</div>
        @enderror
        <label>
            Name
            <input type="text" name="name" value="{{ old('name') }}"> <br>
        </label>
        @error('name')
            <div style="color: red; font-size: 30px" >{{ $message }}</div>
        @enderror
        <label>
            Password
            <input type="password" name="password" value="{{ old('password') }}"> <br>
        </label>
        @error('password')
            <div style="color: red; font-size: 30px">{{ $message }}</div>
        @enderror
        <label>
            Email
            <input type="email" name="email" value="{{ old('email') }}"> <br>
        </label>
        @error('email')
            <div style="color: red; font-size: 30px" >{{ $message }}</div>
        @enderror
        <label>
            Avatar
            <input type="file" name="avatar" value="{{ old('avatar') }} "accept="image/*" multiple> <br>
        </label>
        @error('avatar')
            <div style="color: red; font-size: 30px" >{{ $message }}</div>
        @enderror
        <button type="submit">Sign Up</button>
    </form>
@endsection
