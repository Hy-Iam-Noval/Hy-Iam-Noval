@extends('layout')

@section('body')
    <div class="d-flex justify-content-center " style="height: 100vh; width: 100vw">
        <form action="{{route('login-proses')}}" method='post' class="w-25 p-3 shadow rounded mt-auto mb-auto">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="d-flex">
                <a href="/register"><u>No have account ?</u></a>
                <button type="submit" class="btn btn-primary ml-auto">Submit</button>
            </div>
        </form>
    </div>
@endsection