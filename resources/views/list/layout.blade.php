<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/styles.css"/>
</head>
<body>
@dump(auth()->user()?->email)
@if(auth()->check())
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>
@else
    <a href="{{ route("auth.login") }}">Login</a>
@endif
@yield('body')
</body>
</html>
