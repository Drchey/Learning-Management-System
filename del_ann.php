<?php
		include 'includes/admin_header.php';
		include'includes/connect.php';



        $id = $_GET['id'];

 		$data = "DELETE FROM announcements WHERE id = '$id'";

		$qexe = mysqli_query($mysqli,$data);

		if($qexe !== false){
		 echo '<script>swal({
            title: "Announcement Deleted Sucessfully!",
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
		else{
			echo "<script>alert('Record Not Deleted')</script>";
			echo "<script> location='man_announce.php'</script>";
			
		}
	

?>

