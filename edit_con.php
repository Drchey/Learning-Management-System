<?php

include 'includes/admin_header.php';
if(isset($_GET['id'])){

$id = $_GET['id'];
$title =$_GET['title'];
$filename =$_GET['filename'];
$class = $_GET['class'];


$getdata = "SELECT * FROM article WHERE 'id' = '$id'";
$queryexe = mysqli_query($mysqli, $getdata);

while ($data = mysqli_fetch_assoc($queryexe)) {
	 $title = $data['title'];
	 $filename = $data['filename'];
	 $class = $data['class'];

}}

    if (isset($_POST['submit'])) {

        $class = $mysqli->real_escape_string($_POST['class']);
        $title = $mysqli->real_escape_string($_POST['title']);
        $fileName = $_FILES['file']['name'];
        $fileTmpName =$_FILES['file']['tmp_name'];
        $fileSize= $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType =$_FILES['file']['type'];


        $fileExt= explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));


        $allow = array('jpg', 'jpeg', 'png','pdf','mp4','mov','ppt','docx');

        if (in_array($fileActExt, $allow)) {
            if($fileError === 0 ){

                if ($fileSize < 800000000 ){

                    $fileNameNew = uniqid('',true).".".$fileActExt;
                    $fileDestination = "uploads/".$fileNameNew;
					$filename = $fileNameNew;
                    if(move_uploaded_file($fileTmpName,$fileDestination)){

       	$ins = "UPDATE article SET title ='$title', filename ='$filename', class ='$class' WHERE id ='$id'";
            $quer = mysqli_query($mysqli,$ins);
              if ($quer !== false) {
			 echo '<script>swal({
					 title: "Article Updated Sucessfully!",
					 icon: "success",
			   		buttons: true,
					 }).then(function(ok) {
					    if (ok) {
				    	location = "view_con.php";
				 	 }
				 	 else{				  
				  }
		 			 });</script>';
                    	}
                    	else{
                    		echo "<script>swal('File Unable to Upload');</script>";
                    	}
                    }

                    // echo "<script>swal('File Sucessfully Uploaded');location='one_art.php'</script>";

                }
                else{
                    echo "<script>swal('File is too large to be Uploaded');</script>";
                }

            }
            else{
                echo "<script>swal('Error Uploading this File');</script>";
        }
    }
        else{
            echo "<script>swal('You can\'t upload this file ! ');</script>";
        }
     


    }
    
?>

<main style="margin-left: 300px;margin-top: 30px;">
    <h5 class="blue-text"style="margin-left:80%"><i class="material-icons blue-text">book</i>Article</h5>
	</div>

	<div class="divider"></div>


	<div class="row">
		<div class="col l2"></div>
		<div class="col l7 card" style="margin-top:  60px;">
				<h5 class="center-align">Upload Article</h5>

		<form  method="POST" enctype="multipart/form-data" action = ""  autocomplete="off">
        <div class="col l1"></div>
			<div class="col s12 l9">


		 <div class="row">

	      <div class="input-field col s12 l12">
          <input id="title" type="text" name="title" class="validate" value="<?php echo $title ;?>" required>
          <label for="file">Title for Article</label>
       </div>

  <select class="browser-default" name="class" value="<?php echo $class;?>" required>
    <option value="" disabled  selected>Select class</option>
    <option value="SS 1">SS 1</option>
    <option value="SS 2">SS 2</option>
    <option value="SS 3">SS 3</option>
  </select>
     

     <div class="file-field input-field" style="margin-top: 50px;margin-bottom:" value="<?php echo $filename;?>" required>
      <div class="btn light-blue darken-3">
        <span>File</span>
        <input type="file" name="file" >
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>


       <div class="input-field" style="margin-top: 40px;">
        <button type="submit"  value="Upload Image" name="submit" class="btn-large center waves-effect waves-light light-blue darken-3 col l12" style="border-radius: 30px;">UPLOAD ARTICLE</button>
      </div>
    </div>

		</form>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
    $('select').formSelect();
  });
</script>
</main>