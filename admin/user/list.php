<?php
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>

<div class="row">
       	 <div class="col-lg-12">
            <h3 class="page-header"><b>List of Users  </b><a href="index.php?view=add" class="btn btn-primary">  <i class="fa fa-plus-circle fw-fa"></i> Add new user</a>  </h3>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:18px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>#</th> -->
				  		<th>
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		 Account Name</th>
				  		<th>Username</th>
				  		<th>Role</th>
				  		<th width="15%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `tbluseraccount`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->U_NAME.'</a></td>';
				  		echo '<td>'. $result->U_USERNAME.'</td>';
				  		echo '<td>'. $result->U_ROLE.'</td>';
				  		If($result->USERID==$_SESSION['USERID'] || $result->U_ROLE=='MainAdministrator' || $result->U_ROLE=='Administrator') {
				  			$active = "Disabled";

				  		}else{
				  			$active = "";

				  		}

				  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->USERID.'"  class="btn btn-primary">  <span class="fa fa-edit fw-fa"></span> Edit</a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->USERID.'" class="btn btn-danger" '.$active.'><span class="fa fa-trash-o fw-fa"></span> Delete</a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 
				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
			</div>
				</form>
	

</div> <!---End of container-->