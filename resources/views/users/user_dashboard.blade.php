<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('CSS/style.css') }}" rel="stylesheet" type="text/css">
    <title>Dashboard</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/user_prescription">Create prescription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/view-prescription">View prescription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user-approve">Approve quotations</a>
                    </li>

                    <li class="nav-item" class="logout">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>
