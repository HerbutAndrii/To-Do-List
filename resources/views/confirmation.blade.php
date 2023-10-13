@extends('list.layout')
@section('title', 'Form')
@section('body')
    <form class="form" action="{{ route('auth.confirm', ['user' => $user, 'code' => $code]) }}" method="POST">
        @csrf
        <label>
            Code <br>
            <input class="codeInput" name="code" type="text"> 
        </label> <br>
        <button type="submit">Confirm</button>
    </form>
@endsection
