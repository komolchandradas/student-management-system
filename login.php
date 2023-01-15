<?php
    session_start();
    include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title><title>Admin Dashboard</title>
    <link rel="icon" href="../img/favicon2.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="support_files/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="support_files/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="support_files/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="style_files/css/main_style.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins_file/iCheck/square/blue.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page bg-gray">
<div class="login-box">
    <div class="login-logo">
        <div>
            <p><b>Login</b></p>
        </div> 
        
        <small style="text-align: center;color:#000000;font-size:50% !important">
            <marquee><b>School Management System</b></marquee>
        </small>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><b>Enter Email and Password to Login<b></p>

        <form method="post">
            <div class="form-group has-feedback">
                <input name="email" type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-12">
                    <button name="submit" value="submit" type="submit" class="btn btn-info btn-block btn-flat">Login
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user WHERE email ='" . $email . "' and password = '" . $password . "' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['role'] = $row['role'];


                    //$_SESSION['user'] = $row['fname']." ".$row['lname'];


                }

                $sql2 = "SELECT * FROM " . $_SESSION['role'] . " WHERE email ='" . $email . "'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $_SESSION['user'] = $row2['fname'] . " " . $row2['lname'];
                        //$_SESSION['uid'] = $row2['pid'];
                        if ($_SESSION['role'] == 'Student') {
                            $_SESSION['uid'] = $row2['sid'];
                        } else if ($_SESSION['role'] == 'Parent') {
                            $_SESSION['uid'] = $row2['pid'];
                        } else if ($_SESSION['role'] == 'Teacher') {
                            $_SESSION['uid'] = $row2['tid'];
                        }
                    }

                }

                header("Location:./");
            } else {
                echo "<p style='width:100%;text-align;center'>Incorrect username or password</p>";
            }
        }

        ?>


        <!-- /.social-auth-links -->

        <br>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="support_files/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="support_files/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins_file/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
