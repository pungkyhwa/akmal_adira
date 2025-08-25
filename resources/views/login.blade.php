<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | ADIRA Finance Alam Sutera</title>
    <link rel="icon" href="{{ asset('landing_page/logo-adira-mutifinance.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('assets')}}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets')}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets')}}/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="{{ asset('landing_page/logo-adira-mutifinance.png')}}">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="POST" action="{{ route('login.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="name"
                                        placeholder="Username" name="name" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Password" required>
                                </div>
                                @if ($errors->has('login_error'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('login_error') }}
                                    </div>
                                @endif
                                <div class="mt-3 d-grid gap-2">
                                    <button class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets')}}/js/off-canvas.js"></script>
    <script src="{{ asset('assets')}}/js/misc.js"></script>
    <script src="{{ asset('assets')}}/js/settings.js"></script>
    <script src="{{ asset('assets')}}/js/todolist.js"></script>
    <script src="{{ asset('assets')}}/js/jquery.cookie.js"></script>
    <!-- endinject -->
</body>

</html>
