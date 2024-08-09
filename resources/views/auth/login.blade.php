<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
    <style>
        .logo {
            padding-bottom: 20px;
            width: 60%;
            height: auto;
        }

        .bg-gradient-login {
            background: linear-gradient(90deg, rgba(2, 150, 46, 1) 0%, rgba(0, 212, 255, 1) 100%);
            background-size: cover;
        }

        .login-box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            padding: 2rem;
        }

        .login-form .btn {
            color: white;
            background-color: #02962e;
            border-color: #02962e;
        }

        .login-form .btn:hover {
            color: white;
            background-color: #026e1e;
            border-color: #026e1e;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #02962e;
            border-color: #02962e;
        }

        .form-control:focus {
            border-color: #02962e;
            box-shadow: 0 0 0 0.2rem rgba(2, 150, 46, 0.25);
        }

        .card.custom-width {
            width: 100%;
            /* Full width */
            max-width: 600px;
            /* Max width */
        }

        .header-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #02962e;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="login-box">
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5 custom-width">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <img src="{{ asset('img/logo/logo-itsp.png') }}" class="logo">
                                            <h1 class="header-text mb-4">Login Web Inventarisasi Tegakan Sebelum Penebangan</h1>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="username" type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        name="username" value="{{ old('username') }}" required
                                                        autocomplete="username" autofocus placeholder="Username">
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small"
                                                    style="line-height: 1.5rem;">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        {{ __('Login') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
</body>

</html>
