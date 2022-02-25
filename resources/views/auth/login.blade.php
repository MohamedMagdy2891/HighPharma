<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HighPharma | تسجيل الدخول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}">
    <link rel="shortcut icon" href="/assets/dist/img/AdminLTELogo.png" type="image/x-icon">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>High</b>Pharma</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-bold">تسجيل الدخول</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('POST')
                    @if ($errors->has('email') || $errors->has('password'))
                        <div class="form-group">
                            <label class="bg-danger w-100 text-center pt-1 pb-1 font-weight-light text-light">
                                فشل تسجيل الدخول
                            </label>

                        </div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>



                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control" placeholder="Password" name="password" required
                            autocomplete="current-password">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 text-right">
                            <div class="icheck-primary">
                                <label for="remember">
                                    تذكرني
                                </label>
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                            </div>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
                        </div>
                    </div>

                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
