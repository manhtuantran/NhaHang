<!DOCTYPE html>
<html lang="en">
<head>
    <title>HaNoi Restaurant</title>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="admin_login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="admin_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="admin_login/css/main.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="admin/dangnhap" method="POST">
                {{csrf_field()}}
					<span class="login100-form-title p-b-43">
						HaNoi Restaurant
					</span>

                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate = "Valid username is required: ex@abc.xyz">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Username</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('admin_login/images/restaurant.jpg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="admin_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="admin_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="admin_login/vendor/bootstrap/js/popper.js"></script>
<script src="admin_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="admin_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="admin_login/vendor/daterangepicker/moment.min.js"></script>
<script src="admin_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="admin_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="admin_login/js/main.js"></script>

</body>
</html>
