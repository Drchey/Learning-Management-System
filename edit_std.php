<?php
include 'includes/admin_header.php';


if(isset($_GET['id'])){

$id = $_GET['id'];
$first_name =$_GET['first_name'];
$last_name =$_GET['last_name'];
$class = $_GET['class'];
// $Reg_no = $_GET['reg_no'];


$getdata = "SELECT * FROM students WHERE 'id' = '$id'";
$queryexe = mysqli_query($mysqli, $getdata);

while ($data = mysqli_fetch_assoc($queryexe)) {
	 $first_name = $data['first_name'];
	 $last_name = $data['last_name'];
	 $class = $data['class'];

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 $first_name = $mysqli->real_escape_string($_POST['first_name']);
	 $last_name = $mysqli->real_escape_string($_POST['last_name']);
	 $class = $mysqli->real_escape_string($_POST['class']);
	 $last_login = date("d-m-Y");
	$check_std = "SELECT * FROM students WHERE id = '$id'";

	$query = mysqli_query($mysqli,$check_std);

	if($query !== false){
		$numrows = mysqli_num_rows($query);
		$update = "UPDATE students SET first_name ='$first_name', last_name ='$last_name', class ='$class', last_login ='$last_login' WHERE id ='$id'";
			$quer2 = mysqli_query($mysqli,$update);
			if ($quer2 !== false){
				echo '<script>swal({
           title: "Student data Updated Sucessfully!",
           icon: "success",
            buttons: true,
           }).then(function(ok) {
              if (ok) {
              location = "man_std.php";
           }
           else{          
          }
           });</script>';
			}
			else
			{
				echo "<script>swal('Unsucessful Update')</script>";

	}
}
	else{
		echo "<script>swal('Database Failure')</script>";

}
}
}

?>

	<main style = "margin-left: 400px;">

	<div class="row">
		<h5 class="teal-text"style="margin-left:70%"><i class="material-icons teal-text">persons</i>Students</h5>
	
	<!-- </div> -->
	
	<div class = "row" style="margin-top: 4%;"> 
	 <div class =  "col s12 m6 l10">
      <div class = "card">
      	<div class = "row"></div>
        <div class = "card-content ">
          <span class = "card-title center teal-text">Students</span>

         <div class="row" style="margin-top: 40px;">

         	<form  method="POST" class="center" autocomplete="off">

         	<div class="row">
         		<div class="col l2"></div>
         		<div class="row col l9">
      		
      			<!-- <div class="browser-default"> -->
      			
        			 <div class="input-field col s6 l9 ">
         				 <input id="first_name" type="text" class="validate" name="first_name" value="<?php echo $first_name ?>"  required>
         				 <label for="first_name">First Name</label>
      				  </div>

      				<!-- </div> -->
      				 	<div class="row" style="margin-top: 5px;">
        			 <div class="input-field col s6 l9 ">
         				 <input id="last_name" type="text" class="validate" value="<?php echo $last_name ?>" name="last_name" required>
         				 <label for="last_name">Last Name</label>
      				  </div>
      				</div>
      			

      				<div class="row col l9" style="margin-top: 5px;">
					 <select class="browser-default" name="class" id="class" value="<?php echo $class ?>" required>
    					<option value="" disabled  selected><-- Select class --></option>
    					<option value="SS 1">SS 1</option>
   					 	<option value="SS 2">SS 2</option>
   					 	<option value="SS 3">SS 3</option>
 					 </select>		
 					 </div>			

				</div>
				</div>
			</div>

		<!-- </form> -->

            
           		<div class="row" style="margin-left: 600px;">
       			<div class="input-field">
        		<button type="submit" name="signup" class="btn center waves-effect teal" onclick="return confirm('Are you sure you want to edit this content?');">SAVE</button>
      			</div>
    			</div>
         </div>
       </form>
          
  </div>
          
</main>
<?php include 'includes/admin_footer.php';?>