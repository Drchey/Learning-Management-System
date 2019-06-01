<?php 
 include 'administrator/includes/connect.php';
 include 'administrator/includes/core_inc.php';

 $class = getstdDetail('class');
 $name = $_SESSION['admin'];
  $all_pass = "SELECT * FROM students WHERE first_name ='$name'";
  $qexe = mysqli_query($mysqli, $all_pass);

    if ($qexe !== false){
      $data = mysqli_fetch_assoc($qexe);
      if ($data['password'] === '1234') {
        header("Location: change_pwd.php");
      }
    }
    else{
      echo "Error!";
    }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Web | Tutorial | Website</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Computer Online Tutorial">
    <!-- Favicons-->
    <link rel="icon" type="icon/png" href="images/favicon/avatar.jpg">
    <!-- Android 5 Chrome Color -->
    <meta name="theme-color" content="#FFFFFF">
    <!-- CSS-->
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

  </head>
  <body style="font-family: 'Segoe UI', Tahoma, sans-serif;">
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>

<nav>
    <div class="nav-wrapper cyan accent-4">
      <li class="brand-logo center">Hi,<span><?php echo getstdDetail('first_name')?></span></li>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <a href=""><li data-target="slide-out" class="hide-on-large sidenav-trigger white-text"><i class ="material-icons">menu</i><a></li>
      </ul>
    <a href="logstd.php" onclick="return confirm('Are you sure you want to logout?');"><i class="material-icons" style="margin-left: 90%;font-size: 30px;">exit_to_app</i></a>
    </div>
  </nav>

  <div class="row" style="margin-top: 3%;margin-left: 80%;">
 


    </div>

 <ul id="slide-out" class="sidenav">
    <li><div class="user-view center-align">
      <div class="background">
        <img src="images/frozen.jpg">
      </div>
      <div class="center" style="margin-left: 2px;">
      <img class="circle center-align" src="img/geek.png">
      <span class="red-text ">Hi,</span><span><?php echo getstdDetail('first_name');?></span>&nbsp;&nbsp;
      <span class="white-text "><?php echo getstdDetail('class');?></span>
      </div>
   </div></li>
    </div>
    <li><a class="dropdown-trigger"  href='#' data-target='dropdown1'><i class="material-icons" >account_circle</i>profile</a></li>
    <li><a class=""  href='change_pwd.php' data-target='dropdown1'><i class="material-icons" >edit</i>Change Password</a></li>
    <li><div class="divider"></div></li>
  
  <?php
    include 'administrator/includes/connect.php';
          $all_announce = "SELECT * FROM students where class ='$class' ";
          $qexe = mysqli_query($mysqli,$all_announce);

          if ($qexe !== false){
          $numrows = mysqli_num_rows($qexe);
          if($numrows > 0){
            while( $data = mysqli_fetch_assoc($qexe)){

   echo '
  <ul id="dropdown1" class="dropdown-content center">
    <li><a href="#"><i class="material-icons">person</i>'."   ".''.$data['first_name'].' '.$data['last_name'].'</a></li>
    <li><a href="#"><i class="material-icons">school</i>'.$data['class'].'</a></li>
    <li class="divider" tabindex="-1"></li>
 
  </ul>
';
}}}?>



  

  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons white-text">menu</i></a>

  
<!-- contents of study  -->
      <?php
     
          $all_announce = "SELECT * FROM article WHERE class= '$class' ORDER BY id DESC";
          $qexe = mysqli_query($mysqli,$all_announce);

         

          if ($qexe !== false){
          $numrows = mysqli_num_rows($qexe);
          if($numrows > 0){
            while( $data = mysqli_fetch_assoc($qexe)){
            echo 
            '
				  <div class="row" style="margin-top:5%;">
				  <div class="col l3 s3 m1"></div>
				    <div class="col s19 m10 l8">
				      <div class="card">
				        <div class="card-content black-text">
				          <span class="card-title"><strong class="indigo-text">'.$data['title'].'</strong></span>
				        </div>
				        <div class="card-action" style="margin-left:75%;">
				          <a href="administrator/uploads/'.$data['filename'].'" class="btn cyan">VIEW FILE</a>
				        </div>
				      </div>
				    </div>
				  </div>
         ';    // <button data-target="modal1" class="btn modal-trigger">Modal</button>

                }
              }
              else{
                echo'
                <div class="row">
                <div class ="col l3"></div>
                <div class ="row card col l8" style ="font-size: 40px">
                <p class= "center-align red-text">

                No Content Yet
                </p>

                </div></div></div>
                ';
              }
            }
            else{
              echo "Error";
            }


            ?>





<script type="text/javascript">
	  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

     $('.dropdown-trigger').dropdown()

      $(document).ready(function(){
    $('.modal').modal();
  });
</script>

<!-- comment session -->

<div class="row" style="margin-left: 12%; margin-top: 14%;">

  <!-- <h4><strong>Comments</strong></h4> -->

    

</div>