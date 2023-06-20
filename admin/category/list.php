<?php 
	  if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-6">
            <h3 class="page-header"><b>List of Categories</b>  <a href="index.php?view=add" class="btn btn-primary">  <i class="fa fa-plus-circle fw-fa"></i> Add new category</a>  </h3>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			<div class="row">
				<div class="col-lg-6">

	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:18px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>No.</th> -->
				  		<th>
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		 Category</th> 
				  		 <th width="15%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblcategory`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		// echo '<td>
				  		//      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGID. '"/>
				  		// 		' . $result->CATEGORIES.'</a></td>';
				  			echo '<td>' . $result->CATEGORIES.'</td>';
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->CATEGID.'" class="btn btn-primary">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->CATEGID.'" class="btn btn-danger">  <span class="fa  fa-trash-o fw-fa "></a></td>';
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
			
			
				</form> 
				</div>

			</div>
			<div class="col-lg-6">
				<img class="" style="height:400px;margin-left:60px;margin-top:100px;" src="<?php echo web_root.'admin/images/2.png' ?>" />
			</div>