@extends('layout')

@section('body')
    <div class="d-flex justify-content-center " style="height: 100vh; width: 100vw">
        <form action="{{route('register-proses')}}" method='post' class="w-25 p-3 shadow rounded mt-auto mb-auto">
            @csrf
            <div class="form-group">
                <input type="text" name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
            </div>
            @error('name')
                <p class='text-danger'>{{$message}}</p>
            @enderror

            <div class="form-group">
                <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            @error('email')
                <p class='text-danger'>{{$message}}</p>
            @enderror

            <div class="form-group">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            @error('password')
                <p class='text-danger'>{{$message}}</p>
            @enderror

            <div class="form-group">
                <input type="password" name="confirm-password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Your Password">
            </div>
            @error('confirm-password')
                <p class='text-danger'>{{$message}}</p>
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">What are you want ?</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="position">
                    <option value="owner" selected>I just want to make my account</option>
                    <option value="admin">I want make my own laundry</option>
                    <option value="cashier">I want to be a cashier</option>
                </select>
            </div>

            <div class="d-flex">
                <a href="/login">Back</a>
                <button type="submit" class="btn btn-primary ml-auto">Submit</button>
            </div>
        </form>
    </div>
@endsection