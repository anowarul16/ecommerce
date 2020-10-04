<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PatientBook | Reset password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="{{ url('login') }}"><b>Patient</b>Book</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
@endif
<!-- User name -->
    <div class="lockscreen-name">John Doe</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset('/') }}admin/dist/img/user1-128x128.jpg" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->
        <!-- lockscreen credentials (contains the form) -->
        <form method="POST" action="{{ route('password.email') }}" class="lockscreen-credentials">
            @csrf
            <div class="input-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <div class="input-group-append">
                    <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your email to retrieve your password
    </div>
    <div class="text-center">
        <a href="{{ url('login') }}">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2020-2020 <b><a href="http://linereflection.com" class="text-black">PatientBook</a></b><br>
        All rights reserved
    </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{ asset('/') }}admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
