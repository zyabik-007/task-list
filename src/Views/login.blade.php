@extends('layouts.app')

@section('content')
    <form method="post" class="card-body mw-10 m-auto text-center" action="./login">
        <div class="input-group mb-3">
            <input type="text" name="login" class="form-control" placeholder="Login" aria-label="Login"
                   aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                   aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
        <p>
        <div>Login: admin</div>
        <div>Password: 123</div>
        </p>
    </form>
@endsection