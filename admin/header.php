<?php  if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
		error_reporting(0);
		ob_start();
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
    <title> Admin Area</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
 .card{
    border: none;
}
.card-header{
    background-color: transparent;
    border: none;   
}  
.pos-f-t{
    width: 100%;
} 
.navbar-nav {
    float: right;
}
</style>
</head>

<body>

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

           <?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>
            <div class="header-menu">

                <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">

                    <div class="pos-f-t">
                    <nav class="navbar navbar-light bg-white">
                        <button class="navbar-toggler  ml-auto hidden-sm-up float-xs-right" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      </nav>
                          <div class="collapse" id="navbarToggleExternalContent">
                        <div class="bg-white p-4">
                          <ul class="navbar-nav">

                                  <li class="nav-item">
                                    <a class="nav-link" href="view_user.php">Cards List </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="change_pass.php">Change Password </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout </a>
                                  </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                   
                    </div>
                </div>
            </div>

               
            </div>

        </header>
    <!-- /header -->
        <!-- Header-->
 <style type="text/css">
     
.msg_font_size{

    font-size: 12px;
    font-weight: 500;
    font-style: italic;

}

 </style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
 <script src="jquery.imagereader-1.1.0.js"></script> 
<script>
$(document).ready(function(){
        $('#company_logo').imageReader({
          renderType: 'canvas',
          onload: function(canvas) {
            var ctx = canvas.getContext('2d');
            ctx.fillStyle = "orange";
            ctx.font = "12px Verdana";
            ctx.fillText("Filename : "+ this.name, 10, 20, canvas.width - 10);
            $(canvas).css({
              width: '100%',
              marginBottom: '-10px'
            });
          }
        });
      });
</script>