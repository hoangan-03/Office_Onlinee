<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/snap.svg-min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../prestyles.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-001.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="login.php" method="post">
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-case-check"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        OFFICE ONLINE
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content" >
                <div class="modal-header flex flex-row justify-between bg-theme-dark items-center">
                    
                    <h4 class="modal-title text-center text-white">Login Failed</h4>
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                </div>
                <div class="modal-body text-2xl text-black">
                    <p class="text-2xl text-black"><?php echo $_SESSION['error']; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default bg-theme-dark text-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
            $(document).ready(function(){
                $('#myModal').modal('show');
            });
        </script>";
        unset($_SESSION['error']);
    }
    ?>

</body>

</html>