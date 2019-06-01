<?php include 'includes/admin_header.php'; ?>
<?php include 'includes/connect.php'; ?>
	
	<main style="margin-left: 400px;margin-top: 10px;">

     <div class="row">
    <h5 class="red-text"style="margin-left:70%"><i class="material-icons red-text">announcements</i>Announcements</h5>  
  </div>
	<div class="row" style="margin-top: 30px;">
 
        <?php
        	include 'includes/connect.php';
        	$all_announce = "SELECT * FROM announcements ORDER BY id DESC";
        	$qexe = mysqli_query($mysqli,$all_announce);

        	if ($qexe !== false){
        	$numrows = mysqli_num_rows($qexe);
        	if($numrows > 0){
        		while( $data = mysqli_fetch_assoc($qexe)){
        		echo 
        		  '<div class ="row">
   					<div class="col s12 m6 l10">
      				<div class="card">
       				 <div class="card-content black-text">
        			<span class="card-title blue-text">'.$data['title'].'</span>
         			 <p >'.$data['content'].'</p>
        				</div>
        			<div class="card-action" style="margin-left:450px;">
         			 <a href="edit.php?id='.$data['id'].' &title='.$data['title'].'&content='.$data['content'].'"class="btn green">edit</a>

         			 <i> &nbsp;&nbsp;</i>

          			<a href="del_ann.php?id='.$data['id'].'&title ='.$data['title'].'&content='.$data['content'].'"class="btn red" onclick="return confirm("Are you sure you want to delete?");">del</a>
        					</div>
     					 </div>
   					 </div>
  					</div>
  					</div>';		// <button data-target="modal1" class="btn modal-trigger">Modal</button>

    						}
    					}
    					else{
    						echo' 
    						<div class ="col l1"></div>
    						<div class ="row card col l9" style ="font-size: 40px">
    						<p class= "center-align red-text">

    						No Announcements Today
    						</p>

    						</div>
    						';
    					}
    				}
    				else{
    					echo "Error";
    				}


        	  ?>
 

<?php include 'includes/admin_footer.php'; ?>