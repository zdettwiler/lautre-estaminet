@extends('layouts.main_layout')

<form method="POST" action="/admin/login">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
