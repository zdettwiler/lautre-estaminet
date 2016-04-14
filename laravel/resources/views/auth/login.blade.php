@extends('layouts.admin_layout')

@section('includes')
    <link rel="stylesheet" media="screen" type="text/css" href="/css/main.css">
@stop

@section('main-content')
	<h1>CONNEXION</h1>

	<form class="edit-table-item-form" method="POST" action="/admin/login">
	    {!! csrf_field() !!}

	    <div>
	        <label for="name">username</label>
	        <input type="text" name="name" value="{{ old('name') }}">
	    </div><br>

	    <div>
	        <label for="password">password</label>
	        <input type="password" name="password" id="password">
	    </div>

	    {{-- <div>
	        <input type="checkbox" name="remember"> Remember Me
	    </div> --}}

	    <div>
	        <button type="submit">Login</button>
	    </div>
	</form>
@stop
