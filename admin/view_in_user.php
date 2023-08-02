<?php
 session_start();
    if(!isset($_SESSION['id']))
   {
    header("location:adminlogin.php");
   }
   else
   { 

	 $user_id_get = $_GET['id'];
	include 'config.php';
	include 'header.php'; 
	//echo $_SERVER['REQUEST_URI'];


	$query	=	"select * from tbl_user where user_id='$user_id_get' ";
				$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
				$row		=	mysqli_fetch_array($rs);
				

?>
<style type="text/css">
	.image-sizes{

	height: 50px;
	width: 50px;
}
</style>



<?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>

			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">User Data</strong>
								</div>
								<div class="card-body">
									
									<div class="row">
										<div class="col-md-12">
										<?php if(!empty($row['company_logo'])){?>	
										<p>	<img src="<?php echo $row['company_logo']?>" height="70px" width="70px"></p>
										<?php }?>
										</div>
									</div>

									<div class="row">
										<?php if(!empty($row['first_name']) && !empty($row['last_name']) ){?>
										<div class="col-md-12">
										<p>Name:	<?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']?></p>
										</div>
										<?php }?>
									</div>

									<div class="row">
											
											<div class="col-md-6">
													<?php if(!empty($row['job_title'])){?>
													<p>Job Title: 		<?php echo $row['job_title']?>	</p>
													<?php }?>


													<?php if(!empty($row['department'])){?>
													<p>Department: <?php echo $row['department']?>	</p>
													<?php }?>
											</div>

											<div class="col-md-6">
												<?php if(!empty($row['profile_photo'])){?>
												<img src="<?php echo $row['profile_photo']?>" height="70px" width="70px">
												<?php }?>
											</div>

									</div>
									<div class="row">
											<div class="col-md-12">
													<?php if(!empty($row['organization'])){?>
													<p>Organization: <?php echo $row['organization']?>	</p>
													<?php }?>
													
											</div>

											

									</div>
									<div class="row">
											<div class="col-md-12">
												
													<?php if(!empty($row['mobile_no'])){?>
													<p><img src="../img/mobile.png"> Mobile:	 		<?php echo $row['mobile_no']?>	</p>
													<?php }?>
													<?php if(!empty($row['email'])){?>
													<p><img src="../img/email.png" class="image-sizes"> Email:	 		<?php echo $row['email']?>	</p>
													<?php }?>
											</div>

									</div>
									<div class="row">
											<div class="col-md-12">
											
													<?php if(!empty($row['mobile_no'])){?>
													<p><img src="../img/whatsapp.png" class="image-sizes"> Whatsapp: 		<?php echo $row['mobile_no']?>	</p>
													<?php }?>
													<p><img src="../img/save.png" class="image-sizes"><a href="" type="download"> Save this contact (download .vcf file.)</a></p>
													<?php if(!empty($row['website'])){?>
													<p><img src="../img/website.png" class="image-sizes"> Website: 		<?php echo $row['website']?>	</p>
													<?php }?>
													<?php if(!empty($row['linkedin_profile'])){?>
													<p><img src="../img/linkedin.png" class="image-sizes"> LinkedIn: 		<?php echo $row['linkedin_profile']?>	</p>
													<?php }?>
													<?php if(!empty($row['insta_profile'])){?>
													<p><img src="../img/instagram.png" class="image-sizes"> Instagram: 	<?php echo $row['insta_profile']?>	</p>
													<?php }?>
													<?php if(!empty($row['fb_profile'])){?>
													<p><img src="../img/facebook.png" class="image-sizes"> Facebook:		<?php echo $row['fb_profile']?>	</p>
													<?php }?>
													<?php if(!empty($row['twitter_profile'])){?>
													<p><img src="../img/twitter.png" class="image-sizes"> Twitter:		  	<?php echo $row['twitter_profile']?>	</p>
													<?php }?>
													 
											</div>

									</div>
									<div class="row ">
										<div class="col-md-12" style="text-align: center;">
											<button class="btn btn-dark" onclick="goBack()">Go Back</button>
											<a href="update_user.php?id=<?php echo $row['user_id']?>" class="btn btn-dark" >Update Card</a>
										</div>
										
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

                


<script>
function goBack() {
  window.history.back();
}
</script>
 
 
 
 
 
 
<?php   }

 include 'footer.php';

?>