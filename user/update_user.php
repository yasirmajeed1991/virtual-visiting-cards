<?php
session_start();
    if(!isset($_SESSION['id']))
   {
    header("location:adminlogin.php");
   }
   else
   {
include 'config.php';
include 'header.php';
$hide_button=0;

$user_logged = $_SESSION['id'];
if(isset($_POST['change_password']))
{
	$password = md5($_POST['password']);
	 $sql = "UPDATE tbl_user SET password = '$password' WHERE user_id = '$user_logged'";
	$rs = mysqli_query($conn,$sql);
	if($rs)
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Password Changed Successfully
		</p>';
		header ('location:update_user.php');

	}
	else{
		echo "Error" . "<br>" . mysqli_error($conn);
	}
}

if(!empty($_SESSION['id']))
{

					$query 	= "SELECT * FROM tbl_user WHERE user_id='$user_logged'";
					$result = mysqli_query($conn,$query) or die(mysqli_error());
					$fetch_row = mysqli_fetch_array($result);
					$company_logo 		= 	$fetch_row['company_logo'];
					$profile_photo 		=	$fetch_row['profile_photo'];
					$first_name 		=	$fetch_row['first_name'];
					$middle_name 		=	$fetch_row['middle_name'];
					$last_name 			=	$fetch_row['last_name'];

					$job_title 			=	$fetch_row['job_title'];
					$department 		=	$fetch_row['department'];
					$organization 		=	$fetch_row['organization'];
					$mobile_no 			=	$fetch_row['mobile_no'];
					$email 				=	$fetch_row['email'];
					$website 			=	$fetch_row['website'];
					$linkedin_profile 	=	$fetch_row['linkedin_profile'];
					$insta_profile 		=	$fetch_row['insta_profile'];
					$fb_profile 		=	$fetch_row['fb_profile'];
					$twitter_profile 	=	$fetch_row['twitter_profile'];
					//Storing for updating image
					$company_logo11 		= 	$fetch_row['company_logo'];
					$profile_photo22 		=	$fetch_row['profile_photo'];
					$first_name11 			=	$fetch_row['first_name'];
					$middle_name11 			=	$fetch_row['middle_name'];
					$last_name11 			=	$fetch_row['last_name'];
					
					$job_title11 			=	$fetch_row['job_title'];
					$department11 			=	$fetch_row['department'];
					$organization11 		=	$fetch_row['organization'];
					$mobile_no11 			=	$fetch_row['mobile_no'];
					$email11 				=	$fetch_row['email'];
					$website11 				=	$fetch_row['website'];
					$linkedin_profile11 	=	$fetch_row['linkedin_profile'];
					$insta_profile11 		=	$fetch_row['insta_profile'];
					$fb_profile11 			=	$fetch_row['fb_profile'];
					$twitter_profile11	 	=	$fetch_row['twitter_profile'];
					/*--------------------------------------*/
	$query 	= "SELECT * FROM  tbl_permission WHERE user_id='$user_logged'";
	$result = mysqli_query($conn,$query) or die(mysqli_error());
	$fetch_row = mysqli_fetch_array($result);
					//For User Permissions
					$company_logo1 		= 	$fetch_row['company_logo'];
					$profile_photo1 	=	$fetch_row['profile_photo'];
					$first_name1 		=	$fetch_row['first_name'];
					$middle_name1 		=	$fetch_row['middle_name'];
					$last_name1 		=	$fetch_row['last_name'];
					$password1 	 		= 	$fetch_row['password'];
					$job_title1 		=	$fetch_row['job_title'];
					$department1 		=	$fetch_row['department'];
					$organization1 		=	$fetch_row['organization'];
					$mobile_no1 		=	$fetch_row['mobile_no'];
					$email1 			=	$fetch_row['email'];
					$website1 			=	$fetch_row['website'];
					$linkedin_profile1 	=	$fetch_row['linkedin_profile'];
					$insta_profile1 	=	$fetch_row['insta_profile'];
					$fb_profile1 		=	$fetch_row['fb_profile'];
					$twitter_profile1 	=	$fetch_row['twitter_profile'];
}


if (isset($_POST["add_user"])) 
	{
			//POSTED RECORD
			//Validation For  Form
		 
					$company_logo 		= 	$_REQUEST['company_logo'];
					$profile_photo 		=	$_REQUEST['profile_photo'];
					$first_name 		=	$_REQUEST['first_name'];
					$middle_name 		=	$_REQUEST['middle_name'];
					$last_name 			=	$_REQUEST['last_name'];
					
					$job_title 			=	$_REQUEST['job_title'];
					$department 		=	$_REQUEST['department'];
					$organization 		=	$_REQUEST['organization'];
					$mobile_no 			=	$_REQUEST['mobile_no'];
					$email 				=	$_REQUEST['email'];
					$website 			=	$_REQUEST['website'];
					$linkedin_profile 	=	$_REQUEST['linkedin_profile'];
					$insta_profile 		=	$_REQUEST['insta_profile'];
					$fb_profile 		=	$_REQUEST['fb_profile'];
					$twitter_profile 	=	$_REQUEST['twitter_profile'];

					//For User Permissions
					$company_logo1 		= 	$_REQUEST['company_logo1'];
					$profile_photo1 	=	$_REQUEST['profile_photo1'];
					$first_name1 		=	$_REQUEST['first_name1'];
					$middle_name1 		=	$_REQUEST['middle_name1'];
					$last_name1 		=	$_REQUEST['last_name1'];
					$password1 	 		= 	$_REQUEST['password1'];
					$job_title1 		=	$_REQUEST['job_title1'];
					$department1 		=	$_REQUEST['department1'];
					$organization1 		=	$_REQUEST['organization1'];
					$mobile_no1 		=	$_REQUEST['mobile_no1'];
					$email1 			=	$_REQUEST['email1'];
					$website1 			=	$_REQUEST['website1'];
					$linkedin_profile1 	=	$_REQUEST['linkedin_profile1'];
					$insta_profile1 	=	$_REQUEST['insta_profile1'];
					$fb_profile1 		=	$_REQUEST['fb_profile1'];
					$twitter_profile1 	=	$_REQUEST['twitter_profile1'];


					/*---------------------IMAGE For Company Logo------------------------------------------------------------*/
				
				if (empty($_FILES["company_logo"]["tmp_name"]))
				{
					$company_logo=$company_logo11; 
				}
				else
				{
						// Set image placement folder
						$target_dir = "img/";
						// Get file path
						$filename = rand(10,100000). basename($_FILES["company_logo"]["name"]);
						$company_logo = $target_dir . $filename;     //Path of the file to be uploaded
						// Get file extension
						$imageExt = strtolower(pathinfo($company_logo, PATHINFO_EXTENSION));
						// Allowed file types
						$allowd_file_ext = array("jpg", "jpeg", "png");
						

						if (!file_exists($_FILES["company_logo"]["tmp_name"])) 
						{
						    
						   
						} 
						else if (!in_array($imageExt, $allowd_file_ext)) 
						{
							$company_logoErr = "Allowed file formats .jpg, .jpeg and .png.";
						            
						} 
						else if ($_FILES["company_logo"]["size"] > 2097152) 
						{
							$company_logoErr =  "File is too large. File size should be less than 2 megabytes.";
						} 
						else if (file_exists($company_logo)) 
						{
							
							$post_main_imgErr = "File already exists.";
							
						} 
						else 
						{
							$ok=1;
						}

							
				}
					 /*---------------------IMAGE  For Profile------------------------------------------------------------*/
					      
				if (empty($_FILES["profile_photo"]["tmp_name"]))
				{
					$profile_photo=$profile_photo22; 
				}
				else
				{
						// Set image placement folder
						$target_dir = "img/";
						// Get file path
						$filename = rand(10,100000). basename($_FILES["profile_photo"]["name"]);
						$profile_photo = $target_dir . $filename;     //Path of the file to be uploaded
						// Get file extension
						$imageExt = strtolower(pathinfo($profile_photo, PATHINFO_EXTENSION));
						// Allowed file types
						$allowd_file_ext = array("jpg", "jpeg", "png");
						

						if (!file_exists($_FILES["profile_photo"]["tmp_name"])) 
						{
						    
						   
						} 
						else if (!in_array($imageExt, $allowd_file_ext)) 
						{
							$profile_photoErr = "Allowed file formats .jpg, .jpeg and .png.";
						            
						} 
						else if ($_FILES["profile_photo"]["size"] > 2097152) 
						{
							$profile_photoErr =  "File is too large. File size should be less than 2 megabytes.";
						} 
						else if (file_exists($profile_photo)) 
						{
							
							$profile_photoErr = "File already exists.";
							
						} 
						else 
						{
							$ok=1;
						}

							
				}
     
					//FIRST NAME

					 if (empty($_POST["first_name"]))
					  {
					    $first_name = $first_name11;
					  } 
					  else 
					  {
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) 
						    {
						      $first_nameErr = "This Field Only Contains letters and White Spaces";
						    }
							if ((strlen($first_name)< 3) || (strlen($first_name) > 50))
							{
								$first_nameErr = "This Field Must be greater than 6 and less than 50 Characters";	
							}
					  }

					//MIDDLE NAME

					 if (empty($_POST["middle_name"]))
					  {
					    $middle_name = $middle_name11;
					  } 
					  else 
					  {
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z-' ]*$/",$middle_name)) 
						    {
						      $middle_nameErr = "This Field Only Contains letters and White Spaces";
						    }
							if ((strlen($middle_name)< 3) || (strlen($middle_name) > 50))
							{
								$middle_nameErr = "This Field Must be greater than 6 and less than 50 Characters";	
							}
					  }  

			        //LAST NAME

					 if (empty($_POST["last_name"]))
					  {
					    $last_name = $last_name11;
					  } 
					  else 
					  {
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) 
						    {
						      $last_nameErr =  "This Field Only Contains letters and White Spaces";
						    }
							if ((strlen($last_name)< 3) || (strlen($last_name) > 50))
							{
								$last_nameErr ="This Field Must be greater than 6 and less than 50 Characters";
							}
					  }
					  

					 //JOB TITLE

					 if (empty($_POST["job_title"]))
					  {
					    $job_title = $job_title11;
					  } 
					  else 
					  {
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z-' ]*$/",$job_title)) 
						    {
						      $job_titleErr = "This Field Only Contains letters and White Spaces";
						    }
							if ((strlen($job_title)< 3) || (strlen($job_title) > 50))
							{
								$job_titleErr = "This Field Must be greater than 6 and less than 50 Characters";	
							}
					  }  

					//department

					 if (empty($_POST["department"]))
					  {
					    $department = $department11;
					  } 
					  else 
					  {
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z-' ]*$/",$department)) 
						    {
						      $departmentErr =  "This Field Only Contains letters and White Spaces";
						    }
							if ((strlen($department)< 3) || (strlen($department) > 50))
							{
								$departmentErr ="This Field Must be greater than 6 and less than 50 Characters";
							}
					  }  

					//organization

					 if (empty($_POST["organization"]))
					  {
					    $organization = $organization11;
					  } 
					  else 
					  {
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z-' ]*$/",$organization)) 
						    {
						      $organizationErr =  "This Field Only Contains letters and White Spaces";
						    }
							if ((strlen($organization)< 3) || (strlen($organization) > 50))
							{
								$organizationErr ="This Field Must be greater than 6 and less than 50 Characters";
							}
					  }  
			  
			       
			        //PHONE
			  		if (empty($_POST["mobile_no"])) 
			  		{
			    		$mobile_no  = $mobile_no11;
			 		} 
			 		else 
			 		{
						
			    		if ((strlen($mobile_no) > 11) || (strlen($mobile_no) < 11))
			    		{
							$mobile_noErr = "Mobile Number Must be 11 Character";	
						}
						elseif (ctype_space($mobile_no))
						{
							$mobile_noErr = "Mobile No always used without spaces";	
						}
						elseif (is_numeric($mobile_no))
						{
							$mobile_no = $mobile_no;	
						}
						else
						{
							$mobile_noErr="Mobile No. must be only digits";
					
						}	
			 		 }


			 		//EMAIL 
			 		if (empty($_POST["email"]))
			 		{
			    		$email  = $email11;
			  		} 
			  		else 
			  		{
			    		
			    		// check if e-mail address is well-formed
			    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			    		{
			      			$emailErr = "Invalid email format";
			    		}
			  		}

			  		//WEBSITE

			  		
						if (empty($_POST["website"]))
			 			{
			    		$website = $website11;
			  			} 

					//linkedin_profile

						

						if (empty($_POST["linkedin_profile"]))
			 			{
			    		$linkedin_profile  = $linkedin_profile11;
			  			} 
						
					//insta_profile

			  		
					if (empty($_POST["insta_profile"]))
			 		{
			    		$insta_profile  = $insta_profile11;
			  		} 

			  		

					//fb_profile
					if (empty($_POST["fb_profile"]))
			 		{
			    		$fb_profile  = $fb_profile11;
			  		} 
			  		
						

					//WEBSITE

			  		
					if (empty($_POST["twitter_profile"]))
			 		{
			    		$twitter_profile = $twitter_profile11;
			  		} 

			  		


	
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($company_logoErr) && empty($profile_photoErr) && empty($first_nameErr) && empty($middle_nameErr) && empty($last_nameErr) && empty($job_titleErr)&& empty($departmentErr)&& empty($organizationErr)&& empty($mobile_noErr)&& empty($emailErr)&& empty($websiteErr)&& empty($linkedin_profileErr)&& empty($insta_profileErr)&& empty($fb_profileErr) && empty($twitter_profileErr))
 {

	//CHECKING FOR RECORD IF DRIVER ALREADY EXISTED	
	        
			if(move_uploaded_file($_FILES["company_logo"]["tmp_name"], $company_logo))
			{
							//			echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
						$imageUrl = $company_logo11;
							//check if image exists
						if(file_exists($imageUrl))
						{
							//delete the image
							unlink($imageUrl);
						}
			}
			 
			if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $profile_photo))
			{
							//			echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
							$imageUrl = $profile_photo22;
							//check if image exists
						if(file_exists($imageUrl))
						{
							//delete the image
							unlink($imageUrl);
						}
			}
		echo	$query = "UPDATE tbl_user SET company_logo='$company_logo',profile_photo='$profile_photo',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',job_title='$job_title',department='$department',organization='$organization',mobile_no='$mobile_no',email='$email',website='$website',linkedin_profile='$linkedin_profile',insta_profile='$insta_profile',fb_profile='$fb_profile',twitter_profile='$twitter_profile' WHERE user_id='$user_logged'";
			mysqli_query($conn,$query) or die(mysqli_error());
			$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Your Card Has Been Updated.
		</p>';
			header("location:update_user.php");
			 
			
			
			
			
}
  
  }

?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Update Card</strong>
                            </div>
                            <div class="card-body">
                                &nbsp;
								
								
								<form   method="POST" enctype="multipart/form-data"> 
								<table class="table table-borderless">
								
								
								<?php if($company_logo1==1){;?>	

								<tr><td>Company Logo: <br><input  type="file" name="company_logo"    
										   value=""  id="company_logo"  accept="image/*"/>
										<?php echo '<p style="color:red">'.$company_logoErr.'</p>';?>
										
									<?php if(!empty($company_logo)){?>
									 <img src="<?php echo $company_logo?>"  height="100px" width="100px">  
									<?php } else{?>
									 <img src="../img/default_img.png"  height="100px" width="100px">  
									<?php }?>	
									</td>
									 
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($profile_photo1==1){?>
								<tr><td>Profile Photo: <br><input  type="file" name="profile_photo"    
										  value="" />
										<?php echo '<p style="color:red">'.$profile_photoErr.'</p>';?>
										
										<?php if(!empty($company_logo)){?>
									  <img src="<?php echo $profile_photo?>" height="120px" width="100px">  
									 <?php }else{?>	

									<img src="../img/default_img.png"  height="100px" width="100px"> 
									 <?php }?>
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>

								<?php if($first_name1==1){?>
								<tr><td>First Name: <br><input   name="first_name" class="form-control" Placeholder="First Name" 
										required="required" type="text" value="<?php echo $first_name;?>" />
										<?php echo '<p style="color:red">'.$first_nameErr.'</p>';?>
										

									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($middle_name1==1){?>
								<tr><td>Middle Name: <br><input   name="middle_name" class="form-control" Placeholder="Middle Name" 
										type="text" value="<?php echo $middle_name;?>" />
										<?php echo '<p style="color:red">'.$middle_nameErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>

								<?php if($last_name1==1){?>
								<tr><td>Last Name: <br><input   name="last_name" class="form-control" Placeholder="Last Name" 
										required="required" type="text" value="<?php echo $last_name;?>" />
										<?php echo '<p style="color:red">'.$last_nameErr.'</p>';?>
										 
									</td>
								</tr>	
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($job_title1==1){ ?>
								<tr><td>Job Title: <br><input   name="job_title" class="form-control" Placeholder="Job Title" 
										 type="text" value="<?php echo $job_title;?>" />
										<?php echo '<p style="color:red">'.$job_titleErr.'</p>';?>
										
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($department1==1){ ?>
								<tr><td>Department: <br><input   name="department" class="form-control" Placeholder="Department" 
										type="text" value="<?php echo $department;?>" />
										<?php echo '<p style="color:red">'.$departmentErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }?>
								<?php if($organization1==1){ ?>
								<tr><td>Organization: <br><input name="organization" class="form-control" Placeholder="Organization" 
										 type="text" value="<?php echo $organization;?>" />
										<?php echo '<p style="color:red">'.$organizationErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($mobile_no1==1){ ?>
								<tr><td>Mobile No: <br><input   name="mobile_no" class="form-control" Placeholder="Mobile No" 
										required="required" type="text" value="<?php echo $mobile_no;?>" />
										<?php echo '<p style="color:red">'.$mobile_noErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($email1==1){ ?>
								<tr><td>Email: <br><input   name="email" class="form-control" Placeholder="Email" 
										required="required" type="email" value="<?php echo $email;?>" />
										<?php echo '<p style="color:red">'.$emailErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($website1==1){?>
								<tr><td>Website Url: <br><input   name="website" class="form-control" Placeholder="website url" 
										 type="url" value="<?php echo $website;?>" />
										<?php echo '<p style="color:red">'.$websiteErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($linkedin_profile1==1){ ?>
								<tr><td>Linked In Profile Link: <br><input   name="linkedin_profile" class="form-control" Placeholder="Linkedin url" 
										type="url" value="<?php echo $website;?>" />
										<?php echo '<p style="color:red">'.$linkedin_profileErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($insta_profile1==1){ ?>
								<tr><td>Instagram Profile Link: <br><input   name="insta_profile" class="form-control" Placeholder="Instagram Profile Link" 
										type="url" value="<?php echo $insta_profile;?>" />
										<?php echo '<p style="color:red">'.$insta_profileErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($fb_profile1==1){ ?>
								<tr><td>Facebook Profile Link: <br><input   name="fb_profile" class="form-control" Placeholder="Facebook Profile Link" 
										type="url" value="<?php echo $fb_profile;?>" />
										<?php echo '<p style="color:red">'.$fb_profileErr.'</p>';?>
										 
									</td>
								</tr>
								<?php }else{$hide_button=$hide_button+1;}?>
								<?php if($twitter_profile1==1){ ?>
								<tr><td>Twitte Profile Link: <br><input   name="twitter_profile" class="form-control" Placeholder="Twitter Profile Link" 
										 type="url" value="<?php echo $twitter_profile;?>" />
										<?php echo '<p style="color:red">'.$twitter_profileErr.'</p>';?>
										 
									</td>
								</tr>
								<?php } if($hide_button<13){?>
								<tr><td><button type="submit" name="add_user" class="btn btn-dark">Save Updates</button>
									<a href="view_in_user.php" class="btn btn-dark">Preview</a>
									</td>

								</tr>
							<?php }else{echo 'you are unauthorised to update record';}?>
								   </table>
							   </form>
							   <form action=" " method="post" accept-charset="utf-8">
							   	<table class="table table-borderless">
							   		
							   			<?php if($password1==1){ ?>
								<tr><td>Password: <br><input   name="password" class="form-control" Placeholder="" 
										  type="password" value="" required="required" />
										<?php echo '<p style="color:red">'.$passwordErr.'</p>';?>
										 <button type="submit" name="change_password" class="btn btn-dark">Change Password</button>
									</td>

								</tr>
								<?php } ?>
								
							   		
							   	</table>	 
							   	
							   </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

                
     
   


<?php }


include 'footer.php';

?>
