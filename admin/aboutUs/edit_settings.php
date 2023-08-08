<?php
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
    

      $query = "SELECT * FROM `tblaboutus` WHERE 1";
      $mydb->setQuery($query);
      $result = $mydb->loadResultList();

      if ($result) {
        foreach ($result as $row) {
            // Access columns by their names
            $email = $row->email;
            $phone = $row->phone;
            $address = $row->address;
            $fb_name = $row->facebook_name;
            $fb_link = $row->facebook_link;
            $website = $row->website;
            $id = $row->id;
            


?> 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" >
 <div class="row">
         <div class="col-lg-12">
            <h3 class="page-header"><b>About Us Details</b></h3>
          </div>
          <!-- /.col-lg-12 -->
</div> 
     <div class="row">
        <div class="col-lg-9">
            <h4 style="margin-left:50px;"><strong><i> Basic Informations </i> </strong></h4>
              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "email" style="font-size:15px;">Email:</label>

                      <div class="col-md-8">
                            <input class="form-control input" id="email" name="email" placeholder=
                            "Email" type="text" value="<?php echo $email; ?>">

                            <input class="form-control input" id="id" name="id" placeholder=
                            "Email" type="hidden" value="<?php echo $id; ?>">
                      </div>
                    </div>
                  </div>  

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "phone"  style="font-size:15px;">Phone:</label>

                      <div class="col-md-8">
                             <input class="form-control input" id="phone" name="phone" placeholder=
                            "Phone" type="text" value="<?php echo $phone; ?>">
                      </div>
                    </div>
                  </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "address"  style="font-size:15px;">Address:</label>

                      <div class="col-md-8"> 
                      <textarea class="form-control input" id="address" name="address" cols="1" rows="3"><?php echo $address; ?></textarea>
                      </div>
                    </div>
                  </div>

                  <h4 style="margin-left:50px;"><strong><i> Socials Informations</i> </strong></h4>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "facebook_name"  style="font-size:15px;">Facebook Name:</label>

                      <div class="col-md-8">
                             <input class="form-control input" id="facebook_name" name="facebook_name" placeholder=
                            "facebook_name" type="text" value="<?php echo $fb_name; ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "facebook_link"  style="font-size:15px;">Facebook Link:</label>

                      <div class="col-md-8">
                             <input class="form-control input" id="facebook_link" name="facebook_link" placeholder=
                            "facebook_link" type="text" value="<?php echo $fb_link; ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "website"  style="font-size:15px;">Website:</label>

                      <div class="col-md-8">
                             <input class="form-control input" id="website" name="website" placeholder=
                            "website" type="text" value="<?php echo $website; ?>">
                      </div>
                    </div>
                  </div> 


  
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn btn-primary" name="save" type="submit" ><span class="fa fa-save fw-fa"></span><b> Save</b></button>
                        <a href="index.php" class="btn  btn-primary" name="back"><span class="fa fa-arrow-left fw-fa"></span> Back</a>
                      </div>
                    </div>
                  </div>

            
        </div>
        <div class="col-lg-3">
          <img class="" style="height:400px; margin-left: -250px;" src="<?php echo web_root.'admin/images/2.png' ?>" />
        </div>
      </div>
          
        </form>
      <?php

    }
    } else {
        echo "No data found.";
    } ?>