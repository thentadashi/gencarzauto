<?php
		check_message(); 
		?> 
		 <style>
			.fa-circle[title] {
			position: relative;
			cursor: pointer;
			}

			.fa-circle[title]:hover::after {
			content: attr(title);
			position: absolute;
			top: -30px;
			left: 50%;
			transform: translateX(-50%);
			padding: 5px;
			background-color: #000;
			color: #fff;
			border-radius: 3px;
			font-size: 14px;
			white-space: nowrap;
			font-family: Arial, Helvetica, sans-serif;
			}
		</style>
		<div class="row">
       	 	<div class="col-lg-6">
            <h3 class="page-header"><b>List of Products</b>  <a href="index.php?view=add" class="btn btn-primary">  <i class="fa fa-plus-circle fw-fa"></i> Add Product</a>  </h3>
       		</div>
			<div class="col-lg-6">
            <h4 class="page-header"><b>Indicators Guide: 
                <a href="index.php?view=list2" class="btn btn-outline"><i class="fa fa-circle" title="Stock is normal" style="color:green"></i>  Stock is normal</a>
				<a href="index.php?view=list3" class="btn btn-outline"><i class="fa fa-circle" title="Stock is low" style="color:orange"></i> Critical Stock Level</a>
				<a href="index.php?view=list4" class="btn btn-outline"><i class="fa fa-circle" title="Out of stock" style="color:red"></i> Out of stock</a></b>
			</h4>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive" >				
				<table id="dash-table"  class="table table-striped"  style="font-size:18px;" cellspacing="0" >
					
				  <thead>
				  	<tr> 
				  		<th width="10%">Mark</th>
				  		<th width="5%"><p style="color: #191c24;">Image</p></th>
				  		<!-- <th>Model</th>  -->
				  		<!-- <th align="left"><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> Product</th>  -->
				  		<th width="20%"><p style="color: #191c24;">Products</p></th> 
				  		<!-- <th>Category</th> -->
				  		<th width="10%"><p style="color: #191c24;">Market Price</p></th>
				  		<th width="10%"><p style="color: #191c24;">Discount%</p></th>  
				  		<th width="10%"><p style="color: #191c24;">Discounted Price</p></th>  

				  		<th width="10%">Quantity</th>  
						<th width="5%"><p style="color: #191c24;">Indicator</p></th>

				  		<!-- <th>Action</th>  -->
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` AND p.`PROQTY` <= p.`ALERT` AND p.`PROQTY` <> 0";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>';
				  		echo '<td width="1%" align="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->PROID. '"/></td>';
				    	echo '<td style="padding:0px;">
							<a class="PROID" href=""  data-target="#productmodal"  data-toggle="modal"  data-id="'.$result->PROID.'"> 
							<img  title="Click to update image" style="width:70px;height:70px;padding:10px;"  src="'. web_root.'admin/products/'.$result->IMAGES . '">
							</a></td>'; 	
				  		// echo '<td><a title="edit" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'"><i class="fa fa-pencil "></i> ' . $result->PROMODEL.'</a></td>';
				  		echo '<td><p><a title="Click to update" href="'.web_root.'admin/products/index.php?view=edit&id='.$result->PROID.'" style=" color: #6c7293;"><i class="fa fa-pencil "></i> '.$result->OWNERNAME.'</a></p></td>';
				  		
				  		echo '<td> &#8369 '.  number_format($result->PROPRICE,2).'</td>';
				  		echo '<td> '.  number_format($result->PRODISCOUNT,0).'</td>';
				  		echo '<td> &#8369 '.  number_format($result->PRODISPRICE,2).'</td>';

				  		echo '<td width="10%">'. $result->PROQTY.'</td>';
						echo '<td width="5%" align="center">';
						if($result->PROQTY >= $result->ALERT){

										echo '<i class="fa fa-circle" title="Stock is Normal" style="color:green"></i>';
							
						}
						elseif($result->PROQTY == 0){
										echo '<i class="fa fa-circle" title="Out of stock" style="color:red"></i>';
						}
						elseif($result->PROQTY <= $result->ALERT){

										echo '<i class="fa fa-circle" title="Stock is Low" style="color:orange"></i>';

						}
						echo '</td>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

				<div class="btn-group">
				  <!-- <a href="index.php?view=add" class="btn btn-default">New</a> -->
				  <button type="submit" class="btn btn-default" name="delete"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
				</div>
				</div>
				</form>
 
 					<div class="modal fade" id="productmodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">ï¿½</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/products/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">

                                                            <input class="proid" type="hidden" name="proid" id="proid" value="">
                                                              <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                