<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="overflow-x: hidden">
    @if (session()->has('success') )
        <div class="alert alert-success alert-dismissible fade show w-25 fixed-top m-1" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show w-25 fixed-top m-1" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @auth
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Datas</a>
                </li>
                @can('admin', auth()->user()->position)
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data management</a>
                    </li>
                @endcan
                <li class="nav-item ml-auto">
                    <a class="nav-link text-light" href="/logout">Logout</a>
                </li>
            </ul>
            </div>
        </nav>
    @endauth
    @yield('body')
    @yield('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>