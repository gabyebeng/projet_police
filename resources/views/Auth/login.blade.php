<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <!-- END Bootstrap -->

    <!-- additional  CSS  -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('cssLog/auth.css') }}">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Connectez-vous!</h2>
                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5" method="post" action="{{ route('handleLogin') }}">
                        @csrf
                        @method('POST')
                        @if (session()->has('message'))
                            <div class="text text-danger">{{ session()->get('message') }}</div>
                        @endif
                        <div class="text-center">
                            <img src="{{ asset('assets/img/kaiadmin/logo3.png') }}"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" id="Username"
                                @error('email') is-invalid @enderror aria-describedby="emailHelp"
                                placeholder="User Name" required>
                        </div>
                        @error('email')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="password" @error('password') is-invalid @enderror required>

                        </div>
                        @error('password')
                            <DIV class="text text-danger">{{ $message }}</DIV>
                        @Enderror
                        <div class="text-center"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">Connecter</button></div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
