<?php

 include 'includes/admin_header.php'; 
 include 'includes/connect.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 	$last_login = date("d-m-Y");
 	$first_name =  $mysqli->real_escape_string($_POST['first_name']);
 	$last_name =  $mysqli->real_escape_string($_POST['last_name']);
 	$class =  $mysqli->real_escape_string($_POST['class']);
  $password = 1234;

	 		$ann_add = "INSERT INTO students (first_name, last_name, class, last_login, password) VALUES ('$first_name', '$last_name', '$class', '$last_login', '$password')";
	 		$queryexe = mysqli_query($mysqli, $ann_add); 

	 		if ($queryexe !== false) {
	 		echo '<script>swal({
            title: "Student Data Uploaded Sucessfully!",
            icon: "success",
            buttons: true,
          }).then(function(ok) {
            if (ok) {
              location = "man_std.php";
            }
            else{
              location = "add_std.php";
            }
          });</script>';
	 	}

	 		else{
	 		echo "<script>alert('Unable to add Student to database, please try again!')</script>";
	 		}
	 	}

	 // else{
	 // 	echo "<script>alert('Try again please!')</script>";
	 // }

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
         				 <input id="first_name" type="text" class="validate" name="first_name" required>
         				 <label for="first_name">First Name</label>
      				  </div>

      				<!-- </div> -->
      				 	<div class="row" style="margin-top: 5px;">
        			 <div class="input-field col s6 l9 ">
         				 <input id="last_name" type="text" class="validate" name="last_name" required>
         				 <label for="last_name">Last Name</label>
      				  </div>
      				</div>
      			

      				<div class="row col l9" style="margin-top: 5px;">
					 <select class="browser-default" name="class" id="class" required>
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
        		<button type="submit" name="signup" class="btn center waves-effect teal" >SAVE</button>
      			</div>
    			</div>
         </div>
       </form>
          
  </div>
          
</main>

<?php include 'includes/admin_footer.php';?>