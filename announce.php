<?php

 include 'includes/admin_header.php'; 

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 	$last_login = date("d-m-Y");
 	$title =  $mysqli->real_escape_string($_POST['title']);
 	$content =  $mysqli->real_escape_string($_POST['content']);

 	$check_title = "SELECT * FROM announcements WHERE title = '$title'";

 	$queryexe = mysqli_query($mysqli, $check_title);

 	if($queryexe !== false){
 		$num_rows = mysqli_num_rows($queryexe);
	 	if ($num_rows > 0) {
	 		echo "<script>swal('".$title." already exist!')</script>";
	 	}
	 	else{
	 		$ann_add = "INSERT INTO announcements (title, content, last_login) VALUES ('$title', '$content','$last_login')";
	 		$queryexe2 = mysqli_query($mysqli, $ann_add); 

	 		if ($queryexe2 !== false) {
	 			echo '<script>swal({
            title: "Announcement has been Sucessfully!",
            icon: "success",
            buttons: true,
          }).then(function(ok) {
            if (ok) {
              location = "man_announce.php";
            }
            else{
              location = "announce.php";
            }
          });</script>';
	 		}
	 		else{
	 		echo "<script>alert('Unable to add ".$content." to our database, please try again!')</script>";
	 		}
	 	}
	 }
	 else{
	 	echo "<script>swal('Try again please!')</script>";
	 }
 }


 ?>

<main style = "margin-left: 400px;">

     <div class="row">
    <!-- <h5 class=""style="margin-left:80%"><i class="material-icons">book</i>Article</h5> -->
		<h5 class="red-text"style="margin-left:70%"><i class="material-icons red-text">announcements</i>Announcements</h5>	
	</div>
	
	<div class = "row"> 
	 <div class =  "col s12 m6 l10">
      <div class = "card">
      	<div class = "row"></div>
        <div class = "card-content ">
          <span class = "card-title center">Announcements</span>

         <div class="row" style="margin-top: 40px;">

         	<form  method="POST" class="center" autocomplete="off">

         	<div class="row">
         		<div class="col l2"></div>
         		<div class="row col l9">
      		
      			<!-- <div class="browser-default"> -->
      			
        			 <div class="input-field col s6 l9 ">
         				 <input id="title" type="text" class="validate" name="title" required>
         				 <label for="title">Title</label>
      				  </div>

      				<!-- </div> -->
      				 	<div class="row" style="margin-top: 5px;">
        			 <div class="input-field col s6 l9 ">
         				 <textarea id="content" type="text"  class="materialize-textarea"  name="content" required></textarea> 
         				 <label for="content">Content</label>
      				  </div>
      				</div>
      				

				</div>
				</div>
			</div>

		<!-- </form> -->

            
           		<div class="row" style="margin-left: 600px;">
       			<div class="input-field">
        		<button type="submit" name="signup" class="btn center waves-effect red accent-3" >SAVE</button>
      			</div>
    			</div>
         </div>
       </form>
          
     			 </div>
    			</div>
  			</div>
			</div>
 
</main>


<?php include 'includes/admin_footer.php'; ?>



