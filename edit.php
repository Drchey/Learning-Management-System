<?php
include 'includes/admin_header.php';
include 'includes/connect.php';

if(isset($_GET['id'])){

$id = $_GET['id'];
$title =$_GET['title'];
$content =$_GET['content'];


$getdata = "SELECT * FROM announcements WHERE 'id' = '$id'";
$queryexe = mysqli_query($mysqli, $getdata);

while ($data = mysqli_fetch_assoc($queryexe)) {
	$title = $data['title'];
	$content = $data['content'];

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title = $mysqli->real_escape_string($_POST['title']);
	$content = $mysqli->real_escape_string($_POST['content']);
	$check_ann = "SELECT * FROM announcements WHERE id = '$id'";

	$query = mysqli_query($mysqli,$check_ann);

	if($query !== false){
		$numrows = mysqli_num_rows($query);
		$update = "UPDATE announcements SET title ='$title', content ='$content' WHERE id ='$id'";
			$quer2 = mysqli_query($mysqli,$update);
			if ($quer2 !== false){
				echo '<script>swal({
            title: "Announcement Updated Sucessfully!",
            icon: "success",
            buttons: true,
          }).then(function(ok) {
            if (ok) {
              location = "man_announce.php";
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
		<a href="man_announce.php" class="btn red" style="margin-left: 70%;border-radius: 10%;">Announcements</a>
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
         				 <input id="title" type="text" class="validate" name="title" value="<?php echo $title?>">
         				 <label for="title">Title</label>
      				  </div>

      				<!-- </div> -->
      				 	<div class="row" style="margin-top: 5px;">
        			 <div class="input-field col s6 l9 ">
         			<textarea id="content" type="text"  class="materialize-textarea"  name="content" value="<?php echo $content?>"></textarea> 
         				 <label for="content">Content</label>
      				  </div>
      				</div>
      				

				</div>
				</div>
			</div>

		<!-- </form> -->

            
           		<div class="row" style="margin-left: 600px;">
       			<div class="input-field">
        		<button type="submit" name="signup" class="btn center waves-effect blue" onclick="return confirm('Are you sure you want to edit this content?');" >SAVE</button>
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