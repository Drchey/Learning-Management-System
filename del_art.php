<?php
		include 'includes/admin_header.php';
		include'includes/connect.php';


        $id = $_GET['id'];

 		$data = "DELETE FROM article WHERE id = '$id'";

		$qexe = mysqli_query($mysqli,$data);

		if($qexe !== false){
			echo '<script>swal({
            title: "Article Deleted Sucessfully!",
            icon: "success",
            buttons: true,
          }).then(function(ok) {
            if (ok) {
              location = "view_con.php";
            }
            else{
            	  location = "view_con.php";
            }
          });</script>';
		}
		else{
			echo "<script>alert('Record Not Deleted')</script>";
			echo "<script> location='view_con.php'</script>";
		}
	

?>

