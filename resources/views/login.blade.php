@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="container" style="width: 720px; margin-top: 15%; margin-bottom: 30px;">
        <h1 style="text-align: center; color: black;">Login</h1>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button style="margin-left: 35%;" type="submit" class="newsletter_button trans_200"><span>Subscribe</span></button>
        </form>
    </div>
@endsection