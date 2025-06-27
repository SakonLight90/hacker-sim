@extends('layouts.terminal')

@section('content')
    <h2>Login</h2>
    @if($errors->any())
        <div class="status-bar" style="color:#ff3333">
            @foreach($errors->all() as $e)
                {{ $e }}<br>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Username:<br>
            <input name="username" type="text" required></label><br><br>
        <label>Password:<br>
            <input name="password" type="password" required></label><br><br>
        <button type="submit">Login</button>
    </form>
@endsection
