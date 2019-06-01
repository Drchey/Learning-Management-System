<?php include 'includes/admin_header.php';
      

?>

<main style="margin-left: 300px;margin-top:0%">
  <div class="row">
    <h5 class=""style="margin-left:80%"><i class="material-icons">dashboard</i> Dashboard</h5>
    <div class="divider"></div>

    <div class="row">

    <div class="col s12 m6 l3 l3">
      <div class="card teal accent-3">
        <div class="card-content white-text">
          <a href="man_std.php"><i class="material-icons white-text">persons</i></a>
          <a href="man_std.php" class="white-text"><p>Students :<span class="white-text" style="font-size: 20px;">

          <?php 

              include 'includes/connect.php';
              $data = "SELECT  COUNT('id') AS num FROM students";
              $fetch = mysqli_query($mysqli,$data);

              $row =mysqli_fetch_assoc($fetch);
          //
              $numuser = $row['num'];

              echo $numuser;
          ?>

          </span></p></a>
        </div>
        
      </div>
    </div>

    <div class="col s12 m6 l3">
      <div class="card light-blue darken-3">
        <div class="card-content white-text">
          <a href="view_con.php" class="white-text"><i class="material-icons">book</i></a>
          <a href="view_con.php" class="white-text"><p>Course Content : <span class="white-text" style="font-size: 20px;">

            <?php 

              include 'includes/connect.php';
              $data = "SELECT  COUNT('id') AS num FROM article";
              $fetch = mysqli_query($mysqli,$data);

              $row =mysqli_fetch_assoc($fetch);
          //
              $numuser = $row['num'];

              echo $numuser;
          ?>

          </span></p></a>
        </div>
      
      </div>
    </div>

    <div class="col s12 m6 l3">
      <div class="card  red accent-4">
        <div class="card-content white-text">
          <a href="man_announce.php" class="white-text"><i class="material-icons">announcements</i></a>
          <a href="man_announce.php" class="white-text"><p>Announcements : <span class="white-text" style="font-size: 20px;">

            <?php 

              include 'includes/connect.php';
              $data = "SELECT  COUNT('id') AS num FROM announcements";
              $fetch = mysqli_query($mysqli,$data);

              $row =mysqli_fetch_assoc($fetch);
          //
              $numuser = $row['num'];

              echo $numuser;
          ?>

          </span></p></a> 
        </div>
        
      </div>
    </div>

    <div class="col s12 m6 l3">
      <div class="card grey darken-1">
        <div class="card-content white-text">
          <a href="#modal1" class="white-text modal-trigger"><i class="material-icons">perm_identity</i></a>
            <a href="#modal1" class="white-text modal-trigger"><p>About Developer<span style="font-size: 20px;"></span></p></a>

              <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                      <div class="modal-content black-text">
                        <strong><h4>About Developer</h4></strong>
                        <p>project by : OKOH-MICHAEL RICHEY</p><br>
                        <p>&nbsp;&nbsp;&nbsp; 15/25PJ041</p><br>
                        <p>project supervised by :<span class="teal-text">Dr. A.O. AMOSA</span></p>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><span><i class="material-icons">check_box</i></span></a>
                      </div>
                    </div>

        </div>
        
      </div>
    </div>

  </div>
 <div class="row" style="margin-top: 3%;">
    <div class="col s12 m6 l12">
      <div class="card white">
        <div class="card-content popout">
          <span class="card-title">Computer Science Web Tutorial </span>
          <p>This web Tutorial system was constructed to teach knowledge important for the understanding and follow-up of learning content.</p><br>
         <p> Project was supervised by: <span class="teal-text">Dr. A.O. AMOSA</span></p>
        </div>
        
      </div>
    </div>
  </div>

  <div class="row" style="margin-top: 20%;">
    <div class="col l2"></div>
    <div class="card col l7">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="images/me.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">MICHAEL .O. RICHEY <i class="material-icons right">more_vert</i></span>
      <p><a href="javascript:void(0)">15/25PJ041</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">About Project<i class="material-icons right">close</i></span>
      <p>It is therefore the researchers’ expectation that upon the completion of this study, the finding will be beneficial to teachers, students, government and the general public in more ways than one.<br>
    First, this study will assist the teachers in secondary schools in kwara state towards the adaptation of Web-based tutorial mechanisms in their respective schools to make learning more efficient as well as convenient.<br>
      Since the use of instructional materials in teaching in a formal or informal situation has positive results in the sense that it enhances effective understanding in the learners, it will therefore enable the government to produce more Tutorial systems to many more school, to enhance productivity in education.<br>
    More so, it is seen and believed that the use of Web-based systems will immensely help in the creating a more convenient classroom setting and also aid the other student who may be slow to learning. 
    For more discussion and understanding of abstract concept, materials must be used to drive home the learning, and in concrete terms.<br>
    This research will also serve as reference point for both students and the general public who may be interested in these study or carryout a related study.
 </p>
    </div>
  </div>         
</div>




</main>
<?php include 'includes/admin_footer.php';?>
