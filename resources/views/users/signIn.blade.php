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
    <title>Signin</title>
</head>

<body>

    @if (\Session::has('sucess'))
        <div class="alert alert-success fade-message">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <div class="container sign">
        

        <h4 class="heading"> Sign In</h4>

        <form action="/signin" method="POST">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                    placeholder="Enter Your Email...">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" value="{{ old('password') }}" name="password" class="form-control"
                    placeholder="Enter Your Password...">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>
        </form><br>

        If you don't have an account
        <a href="/signup"> Signup</a>
    </div>
</body>

</html>
