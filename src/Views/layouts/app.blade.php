<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="{{\App\Helper::url('css.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="github">
    <h1>
        <b>GitHub:</b> <a href="https://github.com/zyabik-007/task-list">https://github.com/zyabik-007/task-list</a>
    </h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{\App\Helper::url('')}}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link active text-primary " aria-current="page" href="{{\App\Helper::url('create')}}">Create
                        task</a>
                </li>
            </ul>
            @if(!empty(\App\Controllers\UserController::$user))
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{\App\Helper::url('logout')}}">Logout</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <b><a class="nav-link active"
                              aria-current="page">Hi {{\App\Controllers\UserController::$user->login}}!</a></b>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{\App\Helper::url('login')}}">Login</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
<div class="w-50 m-auto">
    @if (\App\Helper::getSessionValue('success'))
        <div class="alert alert-success" role="alert">
            Success
        </div>
    @else
        @if (\App\Helper::hasSessionKey('errors'))
            <div class="alert alert-danger" role="alert">
                @foreach(\App\Helper::getSessionValue('errors') as $name=>$error)
                    @foreach($error as $message)
                        {{$message}}<br>
                    @endforeach
                @endforeach
            </div>
        @endif
    @endif
    {{\App\Helper::clearInfoSession()}}
    @yield('content')
</div>
<br>
<br>
<br>
</body>
</html>