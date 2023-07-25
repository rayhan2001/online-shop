<!doctype html>
<html lang="en" class="minimal-theme">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('admin-asset')}}/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin-asset')}}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/style.css" rel="stylesheet" />
    <link href="{{asset('admin-asset')}}/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{asset('admin-asset')}}/css/pace.min.css" rel="stylesheet" />

    <title>Sign In</title>
</head>

<body>

<!--start wrapper-->
<div class="wrapper">
    <!--start content-->
    <main class="authentication-content">
        <div class="container-fluid">
            <div class="authentication-card">
                <div class="card shadow rounded-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                            <img src="{{asset('admin-asset')}}/images/error/login-img.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title text-center">Sign In</h5>
                                <form class="form-body" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                                                <input type="email" name="email" value="{{old('email')}}" class="form-control radius-30 ps-5" id="inputEmailAddress" placeholder="Email Address" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" name="password" class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-0">Don't have an account yet?
                                                <a href="{{ route('register') }}">Sign up here</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if ($errors->any())
                                <div class="col-lg-10 mx-auto">
                                    <div class="card timeOut radius-30 shadow-lg">
                                        <ul class="mt-3">
                                            @foreach ($errors->all() as $error)
                                                <span class="text-danger">{{ $error }}</span><br>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--end page main-->

</div>
<!--end wrapper-->


<!--plugins-->
<script src="{{asset('admin-asset')}}/js/jquery.min.js"></script>
<script src="{{asset('admin-asset')}}/js/pace.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            document.querySelector('.timeOut').style.display = 'none';
        }, 10000);
    });
</script>

</body>
</html>
