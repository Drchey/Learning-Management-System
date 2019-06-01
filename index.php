<?php 
include 'administrator/includes/head.php';
session_start();
include 'administrator/includes/connect.php';

if (isset($_SESSION['admin'])) {
  header('Location : std_dashboard.php');

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $mysqli ->real_escape_string($_POST['first_name']);
    $password = $mysqli ->real_escape_string($_POST['password']);
  
  $query = "SELECT * FROM students WHERE first_name = '$first_name' AND password ='$password'";
  $queryexe = mysqli_query($mysqli,$query);

  if ($queryexe != false) {
    $numrows = mysqli_num_rows($queryexe);

    if($numrows > 0){
     $_SESSION['admin'] = $first_name;
      header('Location:std_dashboard.php');
      
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

    <div class="slider">
    <ul class="slides">
      <li>
        <img src="images/learn.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3 style="font-style:tahoma;font-size: 80px;">Computer Science Tutorial</h3>
          <h5 class="light amber-text text-lighten-3" style="font-style: Tahoma;font-size: 40px;">Integration of web tutorial in the Educational Students.</h5>
        </div>
      </li>
      <li>
        <img src="images/bhg.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>WEB BASED TUTORIAL</h3>
          <h5 class="light grey-text text-lighten-3">Building a rich e-learning culture</h5>
        </div>
      </li>
      <li>
        <img src="images/ptn.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>15/25PJ041</h3>
          <h5 class="light grey-text text-lighten-3">project supervised by: Dr. A.O. AMOSA</h5>
        </div>
      </li>
    </ul>
  </div>

  <style type="text/css">
    #more{display:none;}
  </style>
      

      <div class="container" style="margin-top: 40px;">

        <div class="col s12 m6 l7">
      <div class="card">
        <div class="card-content blue-text">
          <span class="card-title red-text" Fstyle="font-family:tahoma; margin-bottom: 20px; font-style:bold;"><strong>ABOUT US</strong></span>
            <p>this web based project was designed as a means to help review and gather information as regards <span id = "dots">...</span> <span id ="more">the effects of web based tutorial on secondary school education. The project takes into consideration private secondary schools </span></p>
        </div>
        <!-- <div class="card-action"> -->
          <a href="javascript:void(0)" class="btn-large indigo waves-effect waves-light" style="margin: 10px;border-radius: 30px;" onclick="myFunction()" id="myBtn">Read More </a>
          <!-- <a href="#">This is a link</a> -->
        <!-- </div> -->
        <br><br>
      </div>
    </div>

     <div class="col s12 m6 l5" >
      <div class="card ">
        <form method="POST" class="center" autocomplete="off">
        <div class="card-content indigo-text">
          <span class="card-title "><strong>ARE YOU SIGNED IN?</strong></span>
          
          <div class="row">
            <div class="input-field col l9">
            <input id="first_name" type="text" class="validate" name="first_name" required>
            <label for="first_name">Student's Name</label>
             <div>
         </div>
         </div>
        

            <div class="input-field col l9">
            <input id="password" type="password" class="validate" name="password" required>
            <label for="password">Password</label>
             <div>
         </div>
         </div>
        </div>

      </div>
      <div class="row">
      <button type="submit" name="signup" class="btn center waves-effect waves-light indigo col l8" style="margin-bottom: 40px; margin-left: 10%;">LOG-IN</button>
        </div>
    </form>
    </div>
  </div>
    </div>
     <div class="container" style="margin-top: 15%;">



<?php
          include 'administrator/includes/connect.php';
          $all_announce = "SELECT * FROM announcements ORDER BY id DESC LIMIT 1";
          $qexe = mysqli_query($mysqli,$all_announce);

          if ($qexe !== false){
          $numrows = mysqli_num_rows($qexe);
          if($numrows > 0){
            while( $data = mysqli_fetch_assoc($qexe)){
            echo 
            '<div class ="row" ">
            <div class="col s12 m6 l12">
              <div class="card">
               <div class="card-content black-text">
               <div class="center-align">
               <span class="center teal-text" style="font-size:20px;">ANNOUNCEMENTS</span>
               </div>
               <div class="row" style="margin-top:20px;">
              <span class="card-title red-text">'.$data['title'].'</span>
               <p >'.$data['content'].'</p>
               </div>
                </div>
             </div>
            </div>
            </div>';   

                }
              }
              else{
                echo' 
                <div class ="col l1"></div>
                <div class ="row card col l9" style ="font-size: 40px">
                <p class= "center-align red-text">

                No Announcements today
                </p>

                </div>
                ';
              }
            }
            else{
              echo "Error";
            }


            ?>
      </div>
   </div>

   <div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a  href="administrator/login.php"class="btn-floating red"><i class="material-icons">dashboard</i></a></li>
 
    <li><a href="#" class="btn-floating blue modal-trigger" data-target="modal1"><i class="material-icons">attach_file</i></a></li>


    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                      <div class="modal-content black-text">
                        <strong><h4>About Developer</h4></strong>
                        <p>project by : OKOH-MICHAEL RICHEY</p><br>
                        <p>&nbsp;&nbsp;&nbsp; 15/25PJ041</p><br>
                        <p>project supervised by :<span class="teal-text"> Dr. A.O. AMOSA</span></p>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><span><i class="material-icons">check_box</i></span></a>
                      </div>
                    </div>


</div></div></div>


<?php include 'administrator/includes/footer.php';?>

</body></html>

<script type="text/javascript">
   $(document).ready(function(){
    $('.slider').slider({
      indicators:false
    });
  });

    $(document).ready(function(){
    $('.modal').modal();
  });
     


    $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });
        

    function myFunction(){

      //initialize 
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");

      //ifelse 

      if(dots.style.display === "none"){

        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";


      }
      else{

        dots.style.display = "none";
        btnText.innerHTML = "Read Less";
        moreText.style.display= "inline";
      }

    }

  //    $('slides')({
  //   fullWidth: true,
  // });
        

</script>