<?php
session_start();

/*-----------------------------------------------------------------------------------------------------------------------*/	
include"config.php"; 


//Deleting a user from users record

if($_GET['id']!="" && $_GET['user_del']!="")
	{
		$id		=	$_GET['id'];
		$query	="delete  from lox_passanger where id = $id";
		$rs = mysqli_query($conn,$query);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Record Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_user.php');
	}
	
//message for adding user	

if($_GET['add_user']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		User Record Added Successfully.
		</p>';
		header ('location: view_user.php');
    }	
//message for existing user	
if($_GET['exist_user']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Email Already Existed Please Add Another Record.
		</p>';
		header ('location: add_user.php');
    }	
//message for existing user	
if($_GET['update_exist_user']!="" && $_GET['user_id']!="")
	{
		$id = $_GET['user_id'];
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Email Already Existed Please Add Another Email For Updating User Account.
		</p>';
		header ('location:update_user.php?id='.$id.'');
    }	
//message for updating user

if($_GET['user_updated']!="" && $_GET['user_id']!="")
	{
		$id = $_GET['user_id'];
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Card Updated Successfully.
		</p>';
		header ('location:view_user.php?id='.$id.'');
    }
		
	
	
/*-----------------------------------------------------------------------------------------------------------------------*/		

 

//Deleting a user from record and also images related to user

if( $_GET['del_id']!="")
	{
		$id				=	$_GET['del_id'];
		$query			= "Select * From tbl_user where user_id = '$id' limit 1";
		$rs 			= mysqli_query($conn,$query);
		$row 			=	mysqli_fetch_array($rs);
		$company_logo 	= $row['company_logo'];
		$profile_photo 	= $row['profile_photo'];
		 
		//check if profile image exists
 
		if(file_exists($company_logo) || file_exists($profile_photo) )
		{
			//delete the image
			unlink($company_logo);
			unlink($profile_photo);
		}	
			//after deleting image you can delete the record
			$query	="DELETE tbl_user,tbl_permission From tbl_user INNER JOIN tbl_permission ON tbl_permission.user_id = tbl_user.user_id WHERE tbl_user.user_id = '$id'";
			$rs = mysqli_query($conn,$query);
			$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		   Card Record Has Been Deleted Succesfully.
			</p>';
			header ('location: view_user.php');
		
	}
	

/*-------------------------------------------------------------------------------------------------------------------------*/	
	
//message for updating settings

if($_GET['update_setting']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		Settings Updated Successfully.
		</p>';
		header ('location: settings.php');
    }

/*-------------------------------------------------------------------------------------------------------------------------*/	
	

//DELETING_ADMIN_USER

//Deleting A ADMIN RECORD FROM ADMIN LIST

if($_GET['admin_del']!="" && $_GET['id']!="")
	{
		$id		=	$_GET['id'];
		$query	="DELETE From register_user where id = $id";
		$rs = mysqli_query($conn,$query);
		$row =	mysqli_fetch_array($rs);
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Admin User '.$_GET['admin_del'].' Has Been Deleted Succesfully.
		</p>';
		header ('location: lox_view_user_admin.php');
    }	

//updating driver
	
if($_GET['update_adminn']!="")
{
	$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
	Admin Updated Successfully.
	</p>';
	header ('location: lox_view_user_admin.php');
}
	
//adding admin user	
	
if($_GET['add_admin']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-success" role="alert">
		User Admin added Successfully.
		</p>';
		header ('location: lox_view_user_admin.php');
    }

//existing admin user
	
if($_GET['exist_admin']!="")
	{
		$_SESSION['error_msg']  = '<p class="alert alert-danger" role="alert">
		Admin User Already Existed. Try another one.
		</p>';
		header ('location: lox_view_user_admin.php');
	}


			
	?>
