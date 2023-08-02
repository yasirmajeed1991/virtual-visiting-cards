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

$user_logged = $_SESSION['id'];
$error_msg='';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
					//POSTED RECORD
					$new_password 			= 	$_REQUEST['new_password'];
					$confirm_password 		=	$_REQUEST['confirm_password'];

					if(empty($_REQUEST['confirm_password']) || empty($_REQUEST['new_password'])  )
					{

						$error_msg  = '<p class="alert alert-danger" role="alert">
							Password fields must not be empty.
						</p>';

					}
					elseif($new_password  != $confirm_password )  
					{

						$error_msg   = '<p class="alert alert-danger" role="alert">
							New and Confirm Password Must Be Same.
						</p>';

					}
					else
					{

						$password = $new_password;	
					}
			
			
//CHECKING FOR ERRORS IF THERE IS NOT ANY ERROR THAN THE FORM SHOULD BE SUBMITTED
		if(empty($error_msg))
		 {
			$query = "UPDATE tbl_user SET password='$password' WHERE user_id ='$user_logged' ";
			mysqli_query($conn,$query) or die(mysqli_error());
			$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Password Has Been Changed Succesfully.
		</p>';
			header("location:change_user_pass.php");
					
		}
  
  }

?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Change Password</strong>
                            </div>
                            <div class="card-body">
                                
								
								
								<form   method="POST" > 
									<?php echo $error_msg;?>
								<table class="table table-bordered">
								
								</tr>
								<tr><td>New Password: <br><input   name="new_password" class="form-control" Placeholder="Enter New Password" 
										required="required" type="password" value="" />
									</td>
								</tr>
								
								
								<tr><td>Confirm Password: <br><input   name="confirm_password" class="form-control" Placeholder="Enter Confirm Password" 
										required="required" type="password" value="" />
										
										 
									</td>
								</tr>
								
								<tr><td><button type="submit"  class="btn btn-success">Change Password</button>
									</td>
								</tr>
							
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
