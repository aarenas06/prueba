<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareVet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ config('app.url') }}:8000/asset/css/style.css">
    <link rel="stylesheet" href="{{ config('app.url') }}:8000/asset/css/select.dataTables.min.css">
    <link rel="stylesheet" href="{{ config('app.url') }}:8000/asset/js\datatables.net-bs4\dataTables.bootstrap4.css">
    <link rel="shortcut icon" type="image/png" href="https://www.zarla.com/images/zarla-carevet-1x1-2400x2400-20210809-ctbb9btmp84tpccp4hdr.png?crop=1:1,smart&width=250&dpr=2">
</head>

<body
    style="background-image: url(https://st2.depositphotos.com/1012008/9059/i/600/depositphotos_90595174-stock-photo-veterinary-symbol-background.jpg); background-size: cover;background-attachment: fixed;background-position: center;background-repeat: no-repeat;">


    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CareVet</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('registrar') }}">Registrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('registrar/create') }}">Listar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('calendario') }}">Ver calendario</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div>
        @if (session('message'))
            <center>
                <div class="alert alert-success text-center d-flex">
                    {{ session('message') }}
                </div>
            </center>
        @endif

    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ config('app.url') }}:8000/asset/js/data_table.js"></script>
    <script src="{{ config('app.url') }}:8000/asset/js/jquery.dataTables.js"></script>
    <script src="{{ config('app.url') }}:8000/asset/js/datatables.net-bs4\dataTables.bootstrap4.js"></script>
    @stack('scripts')
</body>

</html>
