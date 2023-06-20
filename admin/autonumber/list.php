<?php 
	  if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h3 class="page-header"><b>List of Autonumber </b> <a href="index.php?view=add" class="btn btn-primary">  <i class="fa fa-plus-circle fw-fa"></i> Add New Autonumber</a>  </h3>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
		<div class="row">
       	 <div class="col-lg-6">
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="example" class="table table-striped table-bordered table-hover"  style="font-size:18px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  		<th>
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		 Autonumber</th> 
				  		  <th>Key</th>
				  		 <th width="15%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblautonumber`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>'; 
			  			echo '<td>' . $result->AUTOSTART.$result->AUTOEND.'</td>';
			  			echo '<td>' . $result->AUTOKEY.'</td>';
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->AUTOKEY.'" class="btn btn-primary">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->AUTOKEY.'" class="btn btn-danger">  <span class="fa  fa-trash-o fw-fa "></a></td>';
				  		// echo '<td></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				 <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if($_SESSION['U_ROLE']=='Administrator'){
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
				</div>
				</div>
				<div class="col-lg-6">
				<img class="" style="height:400px;margin-left:60px;margin-top:100px;" src="<?php echo web_root.'admin/images/2.png' ?>" />
				</div>
				</div>
			
			
				</form>
	 