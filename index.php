<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

    $url =  substr($_SERVER['REQUEST_URI'],-8);
	error_reporting(0);
	//include 'user/config.php';
	
				 /*$user_id_get = $url;
				$query	=	"select * from tbl_user where user_id='$user_id_get' ";
				$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
				$row		=	mysqli_fetch_array($rs);
				if($row<1)
				{
					$msg="<p class='alert alert-danger'>No Record Found Against User Id</P>";
				}*/
	/*VCF File Download Code*/	
require_once "data/DBController.php";
$dbController = new DBController();	
				if(!empty($_GET["action"])) {
    $query = "SELECT * FROM tbl_user WHERE user_id = '$url'";
    $param_type = "i";
    $param_value_array = array($url);
    $contactResult = $dbController->runQuery($query,$param_type,$param_value_array);
    
    require_once "data/VcardExport.php";
    $vcardExport = new VcardExport();
    $vcardExport->contactVcardExportService($contactResult);
    exit;
}

$query = "SELECT * FROM tbl_user WHERE user_id = '$url'";
$result = $dbController->runBaseQuery($query);
				

?>
<!Doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dgtl - Front Page</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="user/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="user/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="user/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="user/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="user/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="user/vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="user/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
 <style>

 	.background-banner{
 		background-color: black;
 		height: 15rem;
 	}
 	.center-image{
 		display: block;
    margin-left: auto;
    margin-right: auto;
     width: 130px;
    height: 130px;
 	}
 	.center-logo{
 		display: block;
    margin-left: auto;
    margin-right: auto;
    
 	}
 	.logo-move{
 		    margin-top: -5rem;
 	}
 	.logo-move>img{
 		height: 250px;
 		width:250px;
    border: 10px solid #03b1fc;
    
 	}
 	.btn{
  background-color: black;
  border: none;
  color: white;
  padding: 3px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 11px 0px;
  border-radius: 24px;
 	}
 	.text-section{
 	margin: auto;
    width: 100%;
    text-align: center;
    top:6rem;
 	}
 .fa{
 	margin-left:9px;
 }
 .icons-settings{
 	margin-top:10rem;
 }
 .icons-round>i{
 	    font-size: 3em;
    border: 3px solid black;
    padding: 15px 19px;
    border-radius: 50%;
    color:black;

 }
 .icons-bottom-text>p{
 	    font-size: 23px;
    color: black;
    margin-top: 1rem;
    margin-left: 9px;
 }
 .icons-center{
 	text-align: center;
 }
 .bottom-text{
 	text-align: center;
 }
a{
	color:black;
}
a:hover{
	color:gray;
}

 </style>   
</head>
<body>
<?php 
    foreach($result as $k=>$v)

    {
?>
<div class="container-fluid">
	<div class="row">
		<!--Top Banner-->
		<div class="col-xs-12 col-md-12 background-banner">
			<div>
				<img src="img/logo.png" class="center-image">
			</div>
		</div>
		<!--Company Logo-->
		<?php if(!empty($result[$k]['company_logo'])){?>	
		<div class="col-xs-12 col-md-12 logo-move">
			<img src="<?php echo substr($result[$k]['company_logo'],3)?>" class="center-logo rounded-circle">
		</div>
	<?php } else { ?>
		<div class="col-xs-12 col-md-12 logo-move">
			<img src="img/default_img.png" class="center-logo rounded-circle">
		</div>
	<?php } ?>	
	</div>
	<!--Name-->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 text-section">
				<?php if(!empty($result[$k]['first_name']) && !empty($result[$k]['last_name']) ){?>
				<h2><?php echo $result[$k]['first_name']." ".$result[$k]['middle_name']." ".$result[$k]['last_name']?> </h2>
				<?php }?>
				<!--Job Titile-->
				<?php if(!empty($result[$k]['job_title'])){?>
				<h5><?php echo $result[$k]['job_title']?>
				<?php }?>
				<?php if(!empty($result[$k]['department'])){?>
				(<?php echo $result[$k]['department']?>)
				<?php }?>
				<?php if(!empty($result[$k]['organization'])){?>
				 - <?php echo $result[$k]['organization']?></h5>
				 <?php }?>
				<!-- Add to Contact Button-->
				<?php  if(empty($result[$k]['first_name']) OR empty($result[$k]['last_name']) ){?>
				<?php } else { ?>
				<a href="?action=export&id=<?php echo $result[$k]["user_id"]; ?>" class="btn btn-lg action">Add to Contacts<i class="fa fa-plus fa-5" aria-hidden="true"></i></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<!--Icons Section-->
	<div class="container icons-settings">
		<div class="row">
			<div class="col-4 icons-center">
				<?php if(!empty($result[$k]['mobile_no'])){?>
				<div class="icons-round">
					<i class="fa fa-phone fa-6" aria-hidden="true"></i>
					<?php //echo $row['mobile_no']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Call Us</a></p>
				</div>
				<?php }?>
			</div>
			<?php if(!empty($result[$k]['mobile_no'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-whatsapp fa-6" aria-hidden="true"></i>
					<?php //echo $row['mobile_no']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">WhatsApp</a></p>
				</div>
			</div>
			<?php }?>
			<?php if(!empty($result[$k]['email'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-envelope fa-6" aria-hidden="true"></i>
					<?php //$row['email']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Email</a></p>
				</div>
			</div>
			<?php }?>
			<?php if(!empty($result[$k]['website'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-globe fa-6" aria-hidden="true"></i>
					<?php //echo $row['website']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Website</a></p>
				</div>
			</div>
		<?php } ?>
		<?php if(!empty($result[$k]['linkedin_profile'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-linkedin fa-6" aria-hidden="true"></i>
					<?php //echo $row['linkedin_profile']?>	
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Linkedin</a></p>
				</div>
			</div>
			<?php }?>
			<?php if(!empty($result[$k]['fb_profile'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-facebook fa-6" aria-hidden="true"><a href=""></a></i>
					<?php //echo $row['fb_profile']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Facebook</a></p>
				</div>
			</div>
		<?php } ?>
		<?php if(!empty($result[$k]['twitter_profile'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-twitter fa-6" aria-hidden="true"><a href=""></a></i>
					<?php //echo $row['twitter_profile']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Twitter</a></p>
				</div>
			</div>
		<?php } ?>
		<?php if(!empty($result[$k]['insta_profile'])){?>
			<div class="col-4 icons-center">
				<div class="icons-round">
					<i class="fa fa-instagram fa-6" aria-hidden="true"><a href=""></a></i>
					<?php //echo $row['insta_profile']?>
				</div>
				<div class="icons-bottom-text">
					<p><a href="#">Instagram</a></p>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<!--Bottom Text-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 bottom-text">
				<h4><a href="user/adminlogin.php"><u>Manage THEdgtIME</u></a></h4>
			</div>
		</div>
	</div>
	</div>
<?php } ?>

<footer>
    <script type="text/javascript" src="user/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

</footer>
</body>
</html>