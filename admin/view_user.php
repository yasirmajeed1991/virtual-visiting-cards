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
//echo $_SERVER['REQUEST_URI'];
$query	=	"select * from tbl_user ";
			$rs		 =	mysqli_query($conn,$query) or die(mysqli_error());
		$html = "";
		while($row		=	mysqli_fetch_array($rs))
		{
				if($row['first_name']!='' && $row['last_name']!='' && $row['mobile_no'] && $row['email'] )
				{

				$html	.=	'<tr style="font-size:12px">
								<td >'.$row['user_id'].'</td>
								<td >'.$row['first_name'].' '.$row['last_name'].'</td>
								
								<td><a  href="../?'.$row['user_id'].'" target="_blank"><i class="fa fa-eye fa-2x"></i></a> 
									<a  href="update_user.php?id='.$row['user_id'].'"><i class="fa fa-edit fa-2x"></i></a>
									<a  href="functions.php?del_id='.$row['user_id'].'"><i class="fa fa-trash fa-2x"></i></a></td> 
								</tr>	  ';
		}
	}

										$query = "SELECT user_id FROM tbl_user WHERE (first_name = '' && last_name = '' && mobile_no = '' && email = '' && password = '')";
										$result = mysqli_query($conn,$query) or die (mysqli_error());
										$user_result_id = mysqli_fetch_array($result);
									
?>

<style>
	.fa{
		padding-inline: 7px;
	}
</style>


<?php if($_SESSION['error_msg']!=''){echo $_SESSION['error_msg']; $_SESSION['error_msg']='';}?>

			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Registered Cards</strong>
								</div>
								<div class="card-body">
									<p align="right"><a  class="btn btn-dark" href="update_user.php?id=<?php echo $user_result_id['0'];?>"><i class="fa fa-plus "></i>Add New Card</a> </p>   
										<table id="bootstrap-data-table-export" class="table table-sm table-borderless">
													<thead>
													<tr>
												 
														<th>ID</th>
														<th>Name</th>
														
														
														<th>Action</th>
															
														
														
													</tr>
													</thead>
										 
												 <?php echo $html;?>
											 
									  </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 

                
 
 
 
 
 
 
 
<?php }

 include 'footer.php';

?>