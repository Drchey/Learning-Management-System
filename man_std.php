<?php 

include'includes/admin_header.php'; ?>

<main style="margin-left: 200px;margin-top: 0px;">
	<div class="row">
    <h5 class="teal-text"style="margin-left:70%"><i class="material-icons teal-text">persons</i>Students</h5>

</div>
	<div class="divider"></div>
	<div class="row" style="margin-top: 30px;">
		<div class="col l1"></div>
		<div class="col l11">
 <table class="card striped">
        <thead class="teal lighten-3 white-text" style="font-family: sans-serif;padding: 100px;">
          <tr>
              <th>Name of Student</th>
              <th>Class</th> 
              <th>Modify</th>
              
          </tr>
        </thead>

        <tbody
        	<?php
        	include 'includes/connect.php';
        	$all_std = "SELECT * FROM students";
        	$qexe = mysqli_query($mysqli,$all_std);

        	if ($qexe !== false){
        		$numrows = mysqli_num_rows($qexe);
        		if($numrows>0){
        			while( $data = mysqli_fetch_assoc($qexe)){
        				echo 
        				'<tr>
        				<td>'.strtoupper($data['first_name']).' '.strtoupper($data['last_name']).'</td>
        				<td>'.strtoupper($data['class']).'</td>


        				<td><a href="edit_std.php?id='.$data['id'].'&first_name='.$data['first_name'].'&last_name='.$data['last_name'].'&class='.$data['class'].'"><i class="material-icons  green-text ">edit</i></a><i> &nbsp;&nbsp;&nbsp;&nbsp;</i>

        				<a href="del_std.php?id='.$data['id'].'"><i class="material-icons tooltipped red-text" data-position = "top" data-tooltip="Deleted Content can\'t be recovered " >delete</i></a>
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
	
</main>
	
