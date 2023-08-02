<?php session_start();
include 'config.php';
$msg='';
    if(isset($_POST['submit']))
        {  
                $email   =   $_POST['email'];
                $new_password   =  md5($_POST['password']);
                $query      =   "SELECT * FROM tbl_user where email = '$email' AND password = '$new_password'";
                $rs         =   mysqli_query($conn,$query) or die(mysqli_error());
                if(mysqli_num_rows($rs) > 0)
                {
                    //$password = md5($_POST['password']);
                    $row                    =   mysqli_fetch_array($rs);
                    $_SESSION['id']         =   $row['user_id'];
                    $_SESSION['timestamp']  =   time(); //set new timestamp
                    header("location:update_user.php");
                }
                else
                {
                 $msg  = "Invalid User Id or Password ";
                }
        
        }

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Area</title>
    <meta name="description" content="Admin Login Area">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<style type="text/css">
    .bg-dark{
        background-color: black !important;
    }
</style>

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="">
                        <img class="align-content" src="img/logo.png" height="100px" width="100px" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <p role="alert" class="alert-danger"><?php echo $msg;?></span></p>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                       <p style="text-align: center;"> <strong><a class="navbar-brand" style="font-size:24px">  User Pannel</a></strong> </p>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                                <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Sign in</button>
                                <br>
                                </div>
                                <div class="form-group">

                                    <p style="text-align: center;"><a href="forgotpassword.php">Forgot Password!</a></p>
                                </div>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
