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
$make_editable_user_msg = "User Editable"; 

$user_logged = $_GET['id'];
if(!empty($_GET['id']))
{
	$query 	= "SELECT * FROM tbl_user WHERE user_id='$user_logged'";
	$result = mysqli_query($conn,$query) or die(mysqli_error());
	$fetch_row = mysqli_fetch_array($result);
					$company_logo 		= 	$fetch_row['company_logo'];
					$profile_photo 		=	$fetch_row['profile_photo'];
					$first_name 		=	$fetch_row['first_name'];
					$middle_name 		=	$fetch_row['middle_name'];
					$last_name 			=	$fetch_row['last_name'];
					$password_old 		= 	$fetch_row['password'];
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


if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
			//POSTED RECORD
			//Validation For DRIVER Form
		 
					$company_logo 		= 	$_REQUEST['company_logo'];
					$profile_photo 		=	$_REQUEST['profile_photo'];
					$first_name 		=	$_REQUEST['first_name'];
					$middle_name 		=	$_REQUEST['middle_name'];
					$last_name 			=	$_REQUEST['last_name'];
					$password 	 		= 	$_REQUEST['password'];
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
					//$company_logo=$company_logo11; 
				}
				else
				{
						// Set image placement folder
						$target_dir = "../img/";
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
					//$profile_photo=$profile_photo22; 
				}
				else
				{
						// Set image placement folder
						$target_dir = "../img/";
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
					    $first_nameErr = "This is required";
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
					   // $middle_nameErr = "This is required";
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
					    $last_nameErr = "This is required";
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
					  //Password

					 if (empty($_REQUEST["password"]) && empty($password_old))
					  {
					    $passwordErr = "This Field is required";
					    
					  }
					  elseif(empty($_Request["password"]) && !empty($password_old))
					  {
					  	$password = $password_old;
					  } 
					  else 
					  {
						    
							if ((strlen($password)< 6) || (strlen($password) > 50))
							{
								$passwordErr ="This Field Must be greater than 6 and less than 50 Characters";
							}
							
					  }

					 //JOB TITLE

					 if (empty($_POST["job_title"]))
					  {
					    //$job_titleErr = "This is required";
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
					    //$departmentErr = "This is required";
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
					   // $organizationErr = "This is required";
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
			    		$mobile_noErr = "This is required";
			 		} 
			 		else 
			 		{
						
			    		if ((strlen($mobile_no) > 11) || (strlen($mobile_no) < 11))
			    		{
							$mobile_noErr = "Mobile Number Must be 11 Character";	
						}
						if (ctype_space($mobile_no))
						{
							$mobile_noErr = "Mobile No always used without spaces";	
						}
						if (is_numeric($mobile_no))
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
			    		$emailErr = "Email is required";
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
			    		//$websiteErr = "This is required";
			  			} 

					//linkedin_profile

						

						if (empty($_POST["linkedin_profile"]))
			 			{
			    		//$linkedin_profileErr = "This is required";
			  			} 
						
					//insta_profile

			  		
					if (empty($_POST["insta_profile"]))
			 		{
			    		//$insta_profileErr = "This is required";
			  		} 

			  		

					//fb_profile
					if (empty($_POST["fb_profile"]))
			 		{
			    		//$fb_profileErr = "This is required";
			  		} 
			  		
						

					//WEBSITE

			  		
					if (empty($_POST["twitter_profile"]))
			 		{
			    		//$twitter_profileErr = "This is required";
			  		} 

			  		


	
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($company_logoErr) && empty($profile_photoErr) && empty($first_nameErr) && empty($middle_nameErr) && empty($last_nameErr) && empty($job_titleErr)&& empty($departmentErr)&& empty($organizationErr)&& empty($mobile_noErr)&& empty($emailErr)&& empty($websiteErr)&& empty($linkedin_profileErr)&& empty($insta_profileErr)&& empty($fb_profileErr) && empty($twitter_profileErr) && empty($passwordErr))
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
			$password = md5($_POST['password']);
		echo	$query = "UPDATE tbl_user SET company_logo='$company_logo',profile_photo='$profile_photo',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',job_title='$job_title',department='$department',organization='$organization',mobile_no='$mobile_no',email='$email',website='$website',linkedin_profile='$linkedin_profile',insta_profile='$insta_profile',fb_profile='$fb_profile',twitter_profile='$twitter_profile',password='$password' WHERE user_id='$user_logged'";
			$rs1=mysqli_query($conn,$query) or die(mysqli_error());
			if(mysqli_affected_rows($conn))
			{
			//Adding Permsion Against a User in Seprate Table
			$query = "UPDATE tbl_permission SET company_logo='$company_logo1',profile_photo='$profile_photo1',first_name='$first_name1',middle_name='$middle_name1',last_name='$last_name1',job_title='$job_title1',department='$department1',organization='$organization1',mobile_no='$mobile_no1',email='$email1',website='$website1',linkedin_profile='$linkedin_profile1',insta_profile='$insta_profile1',fb_profile='$fb_profile1',twitter_profile='$twitter_profile1',password='$password1' WHERE user_id='$user_logged'";
			mysqli_query($conn,$query) or die(mysqli_error());
			header("location:functions.php?user_updated=ok&&user_id=".$user_logged."");

			}	
			
			else
			{
				$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		There is some problem with the card id dont play with card id.
		</p>';
		header ('location: view_user.php');
			}	

}
  
  }

?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="card">
							 <div class="card-header">
                                <strong class="card-title">Card Details</strong>
                            </div>
						<form   method="POST"  enctype="multipart/form-data"> 
						<!--Profile Banner -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<a href="http://thedgtlme.ae/<?php echo $user_logged; ?>" target="_BLANK" >http://thedgtlme.ae/<?php echo $user_logged; ?></a>	
								</div>	
							</div>
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Profile Banner</label>
									<input name="company_logo" class="form-control" Placeholder="" 
									 type="file"><br>
									 <?php if(!empty($company_logo)){?>
									 <img src="<?php echo $company_logo?>"  height="100px" width="100px">  
									<?php } else{?>
									 <img src="../img/default_img.png"  height="100px" width="100px">  
									<?php }?>	

									<?php echo '<p style="color:red">'.$company_logoErr.'</p>';?>
								</div>
								<div class="form-group form-check col-xs-12 col-md-4">
									<br><input type="checkbox"  id="company_logo1" name="company_logo1" value="1" <?php if($company_logo1==1){echo 'checked';}?>>

									<label for="company_logo1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>	
							<!--Profile Photo -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Profile Photo</label>
									<input name="profile_photo" class="form-control" Placeholder="Profile Photo" 
									 type="file"><br>
									  <?php if(!empty($company_logo)){?>
									  <img src="<?php echo $profile_photo?>" height="120px" width="100px">  
									 <?php }else{?>	

									<img src="../img/default_img.png"  height="100px" width="100px"> 
									 <?php }?>	
									<?php if(!empty($profile_photoErr)){echo '<p style="color:red">'.$profile_photoErr.'</p>';}?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="profile_photo1" name="profile_photo1" value="1" <?php if($profile_photo1==1){echo 'checked';}?>>
								<label for="profile_photo1">	<?php echo $make_editable_user_msg?></label>
								</div>	
							</div>							
							<!--First Name -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">First Name</label>
									<input name="first_name" class="form-control" Placeholder="First Name" 
										required="required" type="text" value="<?php echo $first_name;?>">
									<?php echo '<p style="color:red">'.$first_nameErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="first_name1" name="first_name1" value="1" <?php if($first_name1==1){echo 'checked';}?>>
									<label for="first_name1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Middle Name -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Middle Name</label>
									<input name="middle_name" class="form-control" Placeholder="Middle Name" 
									 type="text" value="<?php echo $middle_name;?>">
									<?php echo '<p style="color:red">'.$middle_nameErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="middle_name1" name="middle_name1" value="1" <?php if($middle_name1==1){echo 'checked';}?>>
									<label for="middle_name1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Last Name -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Last Name</label>
									<input name="last_name" class="form-control" Placeholder="Last Name" 
										required="required" type="text" value="<?php echo $last_name;?>">
									<?php echo '<p style="color:red">'.$last_nameErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="last_name1" name="last_name1" value="1" <?php if($last_name1==1){echo 'checked';}?>>
									<label for="last_name1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Job Title -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Job Title</label>
									<input name="job_title" class="form-control" Placeholder="Job Title" 
									type="text" value="<?php echo $job_title;?>">
									<?php echo '<p style="color:red">'.$job_titleErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="job_title1" name="job_title1" value="1" <?php if($job_title1==1){echo 'checked';}?>>
									<label for="job_title1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Department -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Department</label>
									<input name="department" class="form-control" Placeholder="Department" 
									 type="text" value="<?php echo $department;?>">
									<?php echo '<p style="color:red">'.$departmentErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="department1" name="department1" value="1" <?php if($department1==1){echo 'checked';}?>>
									<label for="department1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Organization -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Organization</label>
									<input name="organization" class="form-control" Placeholder="organization" 
									 type="text" value="<?php echo $organization;?>">
									<?php echo '<p style="color:red">'.$organizationErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="organization1" name="organization1" value="1" <?php if($organization1==1){echo 'checked';}?>>
									<label for="organization1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Mobile No -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Mobile No</label>
									<input name="mobile_no" class="form-control" Placeholder="Mobile No" 
									 type="text" value="<?php echo $mobile_no;?>">
									<?php echo '<p style="color:red">'.$mobile_noErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="mobile_no1" name="mobile_no1" value="1" <?php if($mobile_no1==1){echo 'checked';}?>>
									<label for="mobile_no1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Email -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Email</label>
									<input name="email" class="form-control" Placeholder="Email" 
									 required="required" type="email" value="<?php echo $email;?>">
									<?php echo '<p style="color:red">'.$emailErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="email1" name="email1" value="1" <?php if($email1==1){echo 'checked';}?>>
									<label for="email1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							
							<!--Website URL -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Website Url</label>
									<input name="website" class="form-control" Placeholder="Website Url" 
									  type="text" value="<?php echo $website;?>">
									<?php echo '<p style="color:red">'.$websiteErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="website1" name="website1" value="1" <?php if($website1==1){echo 'checked';}?>>
									<label for="website1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
                            <!--Linked In Profile Link -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Linked In Profile Link</label>
									<input name="linkedin_profile" class="form-control" Placeholder="Linked In Url" 
									  type="text" value="<?php echo $linkedin_profile;?>">
									<?php echo '<p style="color:red">'.$linkedin_profileErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="linkedin_profile1" name="linkedin_profile1" value="1" <?php if($linkedin_profile1==1){echo 'checked';}?>>
									<label for="linkedin_profile1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Instagram Profile Link -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Instagram Profile Link</label>
									<input name="insta_profile" class="form-control" Placeholder="Instagram Url" 
									  type="text" value="<?php echo $insta_profile;?>">
									<?php echo '<p style="color:red">'.$insta_profileErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="insta_profile1" name="insta_profile1" value="1" <?php if($insta_profile1==1){echo 'checked';}?>>
									<label for="insta_profile1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Facebook Profile Link -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Facebook Profile Link</label>
									<input name="fb_profile" class="form-control" Placeholder="Facebook Url" 
									  type="text" value="<?php echo $fb_profile;?>">
									<?php echo '<p style="color:red">'.$fb_profileErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="fb_profile1" name="fb_profile1" value="1" <?php if($fb_profile1==1){echo 'checked';}?>>
									<label for="fb_profile1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Twitte Profile Link-->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Twitte Profile Link</label>
									<input name="twitter_profile" class="form-control" Placeholder="Twitter Url" 
									  type="text" value="<?php echo $twitter_profile;?>">
									<?php echo '<p style="color:red">'.$twitter_profileErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
								<br>	<input type="checkbox" id="twitter_profile1" name="twitter_profile1" value="1" <?php if($twitter_profile1==1){echo 'checked';}?>>
									<label for="twitter_profile1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<!--Password -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Password</label>
									<input name="password" class="form-control" Placeholder="Enter password here" 
									type="password" value="<?php echo $password;?>">
									<?php echo '<p style="color:red">'.$passwordErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">

								<br>	<input type="checkbox" id="password1" name="password1" value="1" <?php if($password1==1){echo 'checked';}?>>
									<label for="password1"><?php echo $make_editable_user_msg?></label>
								</div>	
							</div>
							<div class="card-header">
								<button type="submit" name="add_user" class="btn btn-dark">Save Card</button>
								<a  href="view_user.php" class="btn btn-dark">View Cards</a>
							</div>
							</form>
						
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 

                
     
   


<?php }


include 'footer.php';

?>
