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

// This function will return a random 
// string of specified length 
function random_strings($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = 'abcdefgh0123456789'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
} 
  
// This function will generate 
// Random string of length 10 

  
// This function will generate 
// Random string of length 8 
$user_ide = random_strings(8); 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
			//POSTED RECORD
			//Validation For DRIVER Form
	


			$company_logoErr=$profile_photoErr=$first_nameErr=$middle_nameErr=$last_nameErr=$job_titleErr=$departmentErr=$organizationErr=$mobile_noErr=$emailErr=$websiteErr=$linkedin_profileErr=$insta_profileErr=$fb_profileErr=$twitter_profileErr = $passwordErr="";

			$company_logo=$profile_photo=$first_name=$middle_name=$last_name=$job_title=$department=$organization=$mobile_no=$email=$website=$linkedin_profile=$insta_profile=$fb_profile=$twitter_profile=$password="";


					 
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
				if (!isset($_REQUEST['company_logo']))
				{
					//$company_logoErr="This is Required"; 
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
						//post_1st_img
						
						if (!file_exists($_FILES["company_logo"]["tmp_name"])) 
						{
						   $company_logoErr = "Select image to upload";
						   
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
							
							$company_logoErr = "File already exists.";
							
						} 
						else 
						{
							$ok=1;
						}	
				}
					 /*---------------------IMAGE  For Profile------------------------------------------------------------*/
					      if (!isset($_REQUEST['profile_photo']))
				{
				//	$profile_photoErr="This is Required"; 
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
						//post_1st_img
						
						if (!file_exists($_FILES["profile_photo"]["tmp_name"])) 
						{
						   $profile_photoErr = "Select image to upload";
						   
						} 
						else if (!in_array($imageExt, $allowd_file_ext)) 
						{
							$profile_photoErr = "Allowed file formats .jpg, .jpeg and .png.";
						            
						} 
						else if ($_FILES["post_1st_img"]["size"] > 2097152) 
						{
							$profile_photoErr =  "File is too large. File size should be less than 2 megabytes.";
						} 
						else if (file_exists($post_1st_img)) 
						{
							
							$profile_photoErr = "File already exists.";
							
						} 
						else 
						{
							$ok=2;
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

					 if (empty($_REQUEST["password"]))
					  {
					    $passwordErr = "This is required";
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
					   // $departmentErr = "This is required";
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
			    	//	$fb_profileErr = "This is required";
			  		} 
			  		
						

					//WEBSITE

			  		
					if (empty($_POST["twitter_profile"]))
			 		{
			    		//$twitter_profileErr = "This is required";
			  		} 

			  		


	
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
if(empty($company_logoErr) && empty($profile_photoErr) && empty($first_nameErr) && empty($middle_nameErr) && empty($last_nameErr) && empty($job_titleErr)&& empty($departmentErr)&& empty($organizationErr)&& empty($mobile_noErr)&& empty($emailErr)&& empty($websiteErr)&& empty($linkedin_profileErr)&& empty($insta_profileErr)&& empty($fb_profileErr) && empty($twitter_profileErr) && empty($passwordErr)) {

	//CHECKING FOR RECORD IF DRIVER ALREADY EXISTED	
	        
			$query			=	"select * from tbl_user where (email='$email') ";
			$rs		    	=	mysqli_query($conn,$query) or die(mysqli_error());
			$row		    =	mysqli_fetch_array($rs);
			if($row>0){
				header("location:functions.php?exist_user=ok");
			}
			else{
		    $password = md5($_POST['password']);
					
	 		$query = "INSERT INTO tbl_user (user_id,company_logo,profile_photo,first_name,middle_name,last_name,job_title,department,organization,mobile_no,email,website,linkedin_profile,insta_profile,fb_profile,twitter_profile,password) 
			values('$user_ide','$company_logo','$profile_photo','$first_name','$middle_name','$last_name','$job_title','$department','$organization','$mobile_no','$email','$website','$linkedin_profile','$insta_profile','$fb_profile','$twitter_profile','$password')";
			mysqli_query($conn,$query) or die(mysqli_error());
			//Adding Permsion Against a User in Seprate Table
	 		$query = "INSERT INTO tbl_permission (user_id,company_logo,profile_photo,first_name,middle_name,last_name,job_title,department,organization,mobile_no,email,website,linkedin_profile,insta_profile,fb_profile,twitter_profile,password) 
			values('$user_ide','$company_logo1','$profile_photo1','$first_name1','$middle_name1','$last_name1','$job_title1','$department1','$organization1','$mobile_no1','$email1','$website1','$linkedin_profile1','$insta_profile1','$fb_profile1','$twitter_profile1','$password1')";
			mysqli_query($conn,$query) or die(mysqli_error());
			move_uploaded_file($_FILES["company_logo"]["tmp_name"],$company_logo);	
			move_uploaded_file($_FILES["profile_photo"]["tmp_name"],$profile_photo);
			header("location:functions.php?add_user=ok");
			}
			}
			
			
			
			
}
  

?>
<Style>

</style>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add New Card</strong>
                            </div>
							<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
							<!--Profile Banner -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Profile Banner</label>
									<input name="company_logo" class="form-control" Placeholder="" 
									 type="file">
									<?php echo '<p style="color:red">'.$company_logoErr.'</p>';?>
								</div>
								<div class="form-group form-check col-xs-12 col-md-4">
									<input type="checkbox" id="company_logo1" name="company_logo1" value="1" <?php if($company_logo1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
								</div>	
							</div>	
							<!--Profile Photo -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="exampleInputEmail1">Profile Photo</label>
									<input name="profile_photo" class="form-control" Placeholder="Profile Photo" 
									 type="file">
									<?php echo '<p style="color:red">'.$profile_photoErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
									<input type="checkbox" id="profile_photo1" name="profile_photo1" value="1" <?php if($profile_photo1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="first_name1" name="first_name1" value="1" <?php if($first_name1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="middle_name1" name="middle_name1" value="1" <?php if($middle_name1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="last_name1" name="last_name1" value="1" <?php if($last_name1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="job_title1" name="job_title1" value="1" <?php if($job_title1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="department1" name="department1" value="1" <?php if($department1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="organization1" name="organization1" value="1" <?php if($organization1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="mobile_no1" name="mobile_no1" value="1" <?php if($mobile_no1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="email1" name="email1" value="1" <?php if($email1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
								</div>	
							</div>
							<!--Password -->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">password</label>
									<input name="password" class="form-control" Placeholder="Enter password here" 
									 required="required" type="password" value="<?php echo $password;?>">
									<?php echo '<p style="color:red">'.$passwordErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
									<input type="checkbox" id="password1" name="password1" value="1" <?php if($password1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="website1" name="website1" value="1" <?php if($website1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="linkedin_profile1" name="linkedin_profile1" value="1" <?php if($linkedin_profile1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="insta_profile1" name="insta_profile1" value="1" <?php if($insta_profile1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
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
									<input type="checkbox" id="fb_profile1" name="fb_profile1" value="1" <?php if($fb_profile1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
								</div>	
							</div>
							<!--Twitte Profile Link-->
							<div class="row card-header">
								<div class="form-group col-xs-12 col-md-8">
									<label for="">Twitte Profile Link</label>
									<input name="twitter_profile" class="form-control" Placeholder="Facebook Url" 
									  type="text" value="<?php echo $twitter_profile;?>">
									<?php echo '<p style="color:red">'.$twitter_profileErr.'</p>';?>
								</div>
								<div class="form-group col-xs-12 col-md-4">
									<input type="checkbox" id="twitter_profile1" name="twitter_profile1" value="1" <?php if($twitter_profile1==1){echo 'checked';}?>>
									<?php echo $make_editable_user_msg?>
								</div>	
							</div>
							<div class="card-header">
								<button type="submit" name="add_user" class="btn btn-dark">Save New Card</button>
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
