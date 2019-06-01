<?php 

include'includes/admin_header.php'; ?>

<main style="margin-left: 200px;margin-top: 2%;">
    <div class="row">
    <h5 class="blue-text" style="margin-left:80%"><i class="material-icons blue-text">book</i>Article</h5>
    </div>
    <div class="divider"></div>
    <div class="row" style="margin-top: 2%;">
        <div class="col l1"></div>
        <div class="col l11">
          
                     <table class="card striped">
                        <thead class="light-blue darken-3 white-text" style="font-family: sans-serif;padding: 100px;">
                          <tr>
                                <!-- <th>S/N</th> -->
                              <th>Title</th>
                              <th>Filename</th>
                              <th>Class</th>
                              <th>Modify</th>
                              
                          </tr>
                        </thead>

                        <?php
                          include 'includes/connect.php';
                          $all_std = "SELECT * FROM article";
                          $qexe = mysqli_query($mysqli,$all_std);

                          if ($qexe !== false){
                            $numrows = mysqli_num_rows($qexe);
                            if($numrows>0){
                              while( $data = mysqli_fetch_assoc($qexe)){
                                echo 
                                '<tr>
                                <td>'.strtoupper($data['title']).' </td>
                                <td><a href="uploads/'.($data['filename']).'">'.($data['filename']).'</a></td>
                                <td>'.strtoupper($data['class']).'</td>



                                <td><a href="edit_con.php?id='.$data['id'].'&title='.$data['title'].'&filename='.$data['filename'].'&class='.$data['class'].'"><i class="material-icons  green-text ">edit</i></a><i> &nbsp;&nbsp;&nbsp;&nbsp;</i>

                                <a href="del_art.php?id='.$data['id'].'"><i class="material-icons tooltipped red-text" data-position = "top" data-tooltip="Deleted Content can\'t be recovered " >delete</i></a>
                                </td>
                              

                          </tr>';

                                }
                              }
                              else{
                                echo "<tr><td colspan='8' class='red-text center'><h5><strong>No Student's Data</strong></h5></td></tr>";
                              }
                            }
                            else{
                              echo "Error";
                            }


                            ?>
                    </tbody>
                <?php
                include 'includes/connect.php';

                if(isset($_GET['id'])){

                $id = $_GET['id'];
                $regno = $_GET['regno'];

                $getdata = "SELECT * FROM article WHERE 'id' = '$id'";
                $queryexe = mysqli_query($mysqli, $getdata);

                while ($data = mysqli_fetch_assoc($queryexe)) {
                    $title = $data['title'];
                    $filename = $data['filename'];
                    $class =$data['class'];

                }



                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = $mysqli->real_escape_string($_POST['title']);
                    $filename = $mysqli->real_escape_string($_POST['filename']);
                    $class= $mysqli->real_escape_string($_POST['class']);
                    $check_std = "SELECT * FROM article WHERE id = '$id'";
                    $query = mysqli_query($mysqli,$check_std);

                    if($query !== false){
                        $numrows = mysqli_num_rows($query);
                        $update = "UPDATE article SET title ='$title', filename ='$filename', class ='$class' WHERE id ='$id'";
                            $quer2 = mysqli_query($mysqli,$update);
                            if ($quer2 !== false){
                                echo "<script>swal('Update Sucessful')</script>";
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

         