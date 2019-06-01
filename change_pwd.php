<?php  
include 'administrator/includes/head.php';
include 'administrator/includes/core_inc.php';
include 'administrator/includes/connect.php';

 $name = $_SESSION['admin'];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 	// fetch old password from db
 	$fetch = mysqli_query($mysqli, "SELECT * FROM students WHERE first_name = '{$name}'");
 	$data = mysqli_fetch_assoc($fetch);
 	$old_db_password = $data['password'];

 	if ($old_db_password === $_POST['old_password']) {
 		// confirm the new password
 		if ($_POST['new_password'] === $_POST['con_pwd']) {
 			// update the new password
 			$update = mysqli_query($mysqli, "UPDATE students SET password='".$_POST['new_password']."' WHERE first_name = '{$name}'");
 			if ($update) {
 				echo '<script>swal({
						title: "Password updated successfully!",
						icon: "success",
						buttons: true,
					}).then(function(ok) {
						if (ok) {
							location = "std_dashboard.php";
						}
						else{
							
						}
					});</script>';
 			}
 			else{
 				echo '<script>swal("Error Detected")</script>';
 			}
 		}
 		else{
 			echo '<script>swal({
 				title:"New password does not match!",
 				icon: "warning"})</script>';
 		}
 	}
 	else{
 		echo "<script>swal('Invalid old password!'></script>";
 	}
 }



?>

<div class="row">
	<!-- <div class="col div> -->
    
    <div class="row">
        
      <div class="row center" style=""> 
        <div class="col l3 s1 hide-on-med-and-down white-text" style="margin-top:150px;">
        <!--     <h2><strong>Welcome to Class !!! </strong> </h2> -->
        </div>
<div class = "col l6 s12 card-panel white" style ="padding-left: 100px;padding-right:100px;margin-top:100px;border-radius:15px; margin-bottom: 18%;"> 

    <h4 class="amber-text"><strong><i class="material-icons" style="font-size: 50px;">account_circle</i>Change Password</strong></h4>
    <br><br>
    <form action="#" autocomplete="off" method="POST">
    	<div class="input-field">
        <input id="old_password" type="password" class="validate" name="old_password" value="<?php echo $password;?>" required>
        <label for="old_password">Old Password</label>
      </div><br>
      <div class="input-field">
        <input id="password" type="password" class="validate" name="new_password" value="<?php echo $password;?>" required>
        <label for="password">New Password</label>
      </div>
      <br>

      <div class="input-field">
        <input id="con_pwd" type="password" class="validate" name="con_pwd" required>
        <label for="con_pwd">Confirm Password</label>
      </div>
      <br>
   
      <div class="row" style="margin-left: 80%;">
       <div class="input-field">

        <button type="submit" name="signup" class="btn-large waves-effect waves-light amber col l12" style="border-radius: 30px;">SAVE</button>
      </div>
    </div>

   
 
    </form>
  </div>    
      </div>
  </div>
</div>


   <div class="col l3 "></div>


</div>



<?php include 'administrator/includes/footer.php';?>
