<?php
		include 'includes/admin_header.php';
		include'includes/connect.php';


        $id = $_GET['id'];

 		$data = "DELETE FROM students WHERE id = '$id'";

		$qexe = mysqli_query($mysqli,$data);

		if($qexe !== false){
			echo '<script>swal({
            title: "Student Data Deleted Sucessfully!",
            icon: "success",
            buttons: true,
          }).then(function(ok) {
            if (ok) {
              location = "man_std.php";
            }
            else{
            	location = "man_std.php";
            }
          });</script>';
		}
		else{
			echo "<script>alert('Record Not Deleted')</script>";
			echo "<script> location='man_std.php'</script>";
		}
	

?>

