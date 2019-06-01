
<?php include 'includes/header.php';
session_start();

include 'includes/connect.php';

if (isset($_SESSION['admin'])) {
	header('Location : dashboard.php');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$admin_name = $mysqli ->real_escape_string($_POST['admin_name']);
	$password = $mysqli ->real_escape_string($_POST['password']);


	$query = "SELECT * FROM login WHERE name = '$admin_name' AND password ='$password'";
	$queryexe = mysqli_query($mysqli,$query);

	if ($queryexe != false) {
		$numrows = mysqli_num_rows($queryexe);

		if($numrows > 0){
			$_SESSION['admin'] = $admin_name;
			header('Location:dashboard.php');
		}
		else{
			echo '<script>swal({
                title: "Invalid Biodata",
                icon: "warning",
              });</script>';
		}
	}

}


?>           

	<div class="row">
	


    
    <div class="row">
        
      <div class="row center" style=""> 
        <div class="col l4 s1 hide-on-med-and-down white-text" style="margin-top:150px;">
        <!--     <h2><strong>Welcome to Class !!! </strong> </h2> -->
        </div>
<div class = "col l4 s12 card-panel white" style ="padding-left: 100px;padding-right:100px;margin-top:100px;border-radius:15px; margin-bottom: 8%;"> 

    <h4 class="indigo-text"><strong><i class="material-icons" style="font-size: 50px;">group</i>LOGIN</strong></h4>
    <br><br>
    <form action="#" autocomplete="off" method="POST">

     
      <div class="input-field">
        <input id="admin_name" type="text" class="validate" name="admin_name" required>
        <label for="admin_name">Username</label>

      </div><br>
    
      <div class="input-field">
        <input id="password" type="password" class="validate" name="password" required>
        <label for="password">Password</label>
      </div>

   
      <div class="row">
       <div class="input-field">
        <button type="submit" name="signup" class="btn-large center waves-effect waves-light indigo
         col l12" style="border-radius: 30px;">LOG-IN</button>
      </div>
    </div>

   
 
    </form>
  </div>    
      </div>
  </div>
</div>


   <div class="col l3 "></div>


</div>


<?php include 'includes/footer.php'; ?>
