<?php session_start();
include 'config.php';
error_reporting(0);
                                    if(isset($_POST['submit']))
                                    {
                                        
                                        $new_password = $_POST['new_password'];
                                        $confirm_password = $_POST['confirm_password'];
                                        $email = $_POST['email'];

                                        if(empty($new_password) || empty($confirm_password))
                                        {

                                            $new_passwordErr = "Password Must not be empty";

                                        }
                                        else
                                        {
                                            if(strlen($new_password) <8 || strlen($confirm_password)<8)
                                            {
                                                $new_passwordErr  = "Password Must Not Be Less Than 8 Characters";
                                            }
                                            elseif($new_password != $confirm_password)
                                            {
                                                $new_passwordErr    = "New and Confirm password must be same";
                                            }
                                            else
                                            {
                                                $new_password = md5($new_password);
                                            }
                                            
                                        }
                                        if(empty($new_passwordErr))
                                        {
                                            
                                                 $query = "UPDATE tbl_user SET password='$new_password' WHERE email='$email'";
                                                mysqli_query($conn,$query) or die(mysqli_error());
                                                $_SESSION['message_success'] ="<p class='alert alert-success'>Password Has Been Reset Successfully Please Login With Your Details</p>";
                                                header('location:adminlogin.php');
                                                
                                        }

                                    }
                                        
                                    if($_GET['link'])
                                    {
                                        $email=$_GET['link'];
                                        $select="select email from tbl_user where md5(email)='$email'" ;
                                        $result = mysqli_query($conn,$select) or die(mysqli_error());
                                        $row    = mysqli_fetch_array($result);
                                        $email = $row['email'];
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
                     <?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>

                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                       <p style="text-align: center;"> <strong><a class="navbar-brand" style="font-size:24px">  Change Your Password</a></strong> </p>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
                        </div>
                            <div class="form-group">
                                    <input type="hidden" name="email" value="<?php echo $email;?>">
                                <button type="submit" name="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Submit</button>
                                <br>
                                </div>
                                 <div class="form-group">

                                 <p style="text-align: center;"><a href="adminlogin.php">Login!</a></p>
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
