 <!-- sign up modal -->
 <div class="modal fade" id="smyModal" tabindex="-1">
 
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
     
      <div class="modal-body">
         
              <!-- Nav tabs -->

              <ul class="nav nav-pills">
                  <li class="active"><a class="btn btn-default check_out" href="#home" data-toggle="tab">Login</a>
                  </li>
                  <li><a class="btn btn-default check_out" href="#profile" data-toggle="tab">Sign Up</a>
                  </li>
                  
              </ul>

              <!-- Tab panes  login panel-->
              <div class="tab-content">
                  <div class="tab-pane fade in active" id="home">
                      <!-- <h4>Login Tab</h4>  -->
                       <div class="panel panel-pup">
                        <div class="panel-heading">
                            Login Details
                        </div>
                        <div class="panel-body">

                           <form class="form-horizontal span6" name=""  action="login.php" method="POST">
                              <input class="proid" type="hidden" name="proid" id="proid" value="">
                                <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "U_USERNAME">Email:</label>
                                    
                                    <div class="col-md-8">
                                       <input   id="U_USERNAME" name="U_USERNAME" placeholder="Email" type="text" class="form-control input-sm" > 
                             
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "U_PASS">Password:</label>
                                    
                                    <div class="col-md-8">
                                     <input name="U_PASS" id="U_PASS" placeholder="Password" type="password" class="form-control input-sm">
                            
                                    </div>
                                  </div>
                                </div>

                                  <div class="form-group">
                                  <div class="col-md-10">
                                    <label class="col-md-4 control-label" for=
                                    "FIRSTNAME"> </label>
                                    
                                    <div class="col-md-8">
                                    <button type="submit" id="modalLogin" name="modalLogin" class="btn btn-pup"><span class="glyphicon glyphicon-log-in "></span>   Login</button> 
                                     <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> 
                                     <div  style="margin-top: 10px;" class="g-recaptcha"  data-sitekey="6LdjbuImAAAAAOHxQ6yFDG6IwISk_apDzOFoMkv3"></div>
                                     <a href="index.php?q=recoverpassword" style="margin-top: 20px;">Forgot Password</a>
                                    </div>
                                  </div>
                                </div>


 
                            </form>

                                                                                                          
                       </div>
                        <div class="panel-footer">
                        <a href="<?php echo web_root?>"><img src="images/home/NC LOGO.png" alt="" /></a>
                        </div>
                    </div> 
                  </div>
                  <!-- end login panel -->

                  <!-- sign in panel -->
                  <div class="tab-pane fade" id="profile">
                      <!-- <h4>Customer Details</h4>  --> 

                           <form  class="form-horizontal span6" action="customer/controller.php?action=add" onsubmit="return personalInfo();" name="personal" method="POST" enctype="multipart/form-data">
                                <div class="panel panel-pup">
                                    <div class="panel-heading">
                                       Customer Details (Pangasinan Area Only)                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                                    </div>
                                     <div class="panel-body">
                                      <input class="proid" type="hidden" name="proid" id="proid" value="">
                                      <div class="form-group">
                                        <div class="col-md-12">
                                          <!-- <input  id="CUSTOMERID" name="CUSTOMERID"  type="HIDDEN" value="<?php echo $res->AUTO; ?>">  -->
                                          <div class="col-md-5" style="padding-right: 0;">
                                             <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                                                "First Name" type="text" value="">

                                                <input id="province" name="province" type="hidden" value="015500000">
                                          </div>
                                          <div class="col-md-3" style="padding-right: 0;padding-left: 1;">
                                             <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                                                "Middle Name" type="text" value="">
                                          </div>

                                          <div class="col-md-4">
                                             <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                                                "Last Name" type="text" value="">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                            <div class="col-md-12">

                                              <div class="col-md-3">
                                                 <input class="form-control input-sm" id="CUSHOMENUM" name="CUSHOMENUM" placeholder=
                                                    "House#" type="text" value="">
                                              </div>

                                              <div class="col-md-4" style="padding-left: 1px;">
                                                 <input class="form-control input-sm" id="STREETADD" name="STREETADD" placeholder=
                                                    "Street" type="text" value="">
                                              </div>

                                              <div class="col-md-5"style="padding-left: 1px;">
                                                 <input class="form-control input-sm" id="ZIPCODE" name="ZIPCODE" placeholder=
                                                    "Zip code" type="text" value="">
                                              </div>
                                              <input type="hidden" name="SELECTED_LOCATION" id="SELECTED_LOCATION">
                                              <input type="hidden" name="SELECTED_BARANGAY" id="SELECTED_BARANGAY">

                                            </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="col-md-12">                                      
                                              <div class="col-md-7">
                                                  <label for="municipality">Municipality:</label>
                                                  <select id="location" class="form-control" name="CITYADD">
                                                      <option value="">Select Municipality</option>
                                                  </select>
                                              </div>
                                              <div class="col-md-5" style="padding-left: 1px;">
                                                  <label for="barangay">Barangay:</label>
                                                  <select id="barangay" class="form-control" name="BRGYADD">
                                                      <option value="">Select Barangay</option>
                                                  </select>
                                              </div>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-md-12">

                                          <div class="col-md-12">
                                             <input class="form-control input-sm" id="EMAILADD" name="EMAILADD" placeholder=
                                                "Email" type="Email" value="">
                                          </div>
                                        </div>
                                      </div> 
    
                                       <div class="form-group">
                                        <div class="col-md-12">
                                          <div class="col-md-6">
                                             <input class="form-control input-sm" id="CUSUNAME" name="CUSUNAME" placeholder=
                                                "Username" type="text" value="">
                                          </div>
                                          <div class="col-md-6">
                                             <input class="form-control input-sm" id="CUSPASS" name="CUSPASS" placeholder=
                                                "Password" type="password" value=""><span></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-12">

                                          <div class="col-md-12">
                                          <p style="color:red;">Note</p>
                                            <p style="color:red;">Password must be atleast 8 to 15 characters. Only letter, numeric digits, underscore and first character must be a letter.</p>
                                         </div> 
                                        </div>
                                      </div> 
 
                                      <div class="form-group">
                                        <div class="col-md-12">

                                          <div class="col-md-12">
                                             <input class="form-control input-sm" id="PHONE" name="PHONE" placeholder=
                                                "Mobile Number" type="text" value=""  onKeyPress="if(this.value.length==11) return false;">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-12">
                                                  <label class="col-md-2 control-label" for=
                                                  "Birthday" style="margin-right: 15px;">BirthDate: </label>
                                                            <select name="month" class="form-control input-sm col-md-5" style="width: 120px; margin-left: 12px">
                                                            <option value="0" >Month</option>
                                                            <?php
                                                              for( $m = 1; $m <= 12; $m++ ) {
                                                                $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
                                                                $month =  date("F", mktime(0, 0, 0, $m, 1));
                                                                ?>
                                                                  <option value="<?php echo $num; ?>"><?php echo $month; ?></option>
                                                                <?php
                                                              }
                                                            ?>
                                                            </select>
                                                            <select name="day" class="form-control input-sm col-md-5" style="width: 80px;">
                                                            <option value="0">Day</option>
                                                            <?php
                                                              for( $a = 1; $a <= 31; $a++ ) {
                                                                ?>
                                                                  <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                                                                <?php
                                                              }
                                                            ?>
                                                            </select>
                                                            <select name="year" class="form-control input-sm col-md-5" style="width: 100px;">
                                                            <option value="0">Year</option>
                                                            <?php
                                                              for( $y = 1950; $y <= 2021;  $y++) {
                                                                ?>
                                                                  <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                                <?php
                                                              }
                                                            ?>
                                                            </select>

                                                            </select>
                                                         
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <div class="col-md-12">
                                          <label class="col-md-1 control-label" for=
                                          "GENDER">Gender:</label>

                                          <div class="col-md-6" style="margin-top: 5px;margin-left: 55px;">
                                            <input  id="GENDER" name="GENDER" placeholder=
                                                "Gender" type="radio" checked="true" value="Male"><b> Male </b>
                                                <input   id="GENDER" name="GENDER" placeholder=
                                                "Gender" type="radio" value="Female"> <b> Female </b>
                                          </div>
                                        </div>
                                      </div>
                                                                                <hr style="color:#111;">
                                       <div class="form-group">
                                        <div class="col-md-10">
                                           <label class="col-md-1" for="image"></label>
                                          <div class="col-md-12" style="margin-left: 0px">
                                        <p>  <input type="checkbox" id="conditionterms" name="conditionterms" value="checkbox" style="cursor: pointer;" />
                                           <small>I Agree with the <a class="toggle-modal"  style="cursor: pointer;"onclick=" OpenPopupCenter('terms.php','Terms And Codition','600','600')"  ><b>TERMS AND CONDITION</b></a> of Gencarzauto.</small>
                              <div  style="margin-left: 0px;" class="g-recaptcha"  data-sitekey="6LdjbuImAAAAAOHxQ6yFDG6IwISk_apDzOFoMkv3"></div>
                                           
                                          </div>
                                        </div>
                                      </div> 

                                      <div class="form-group">
                                        <div class="col-md-10">
                                           <label class="col-md-4" for=
                                          "image"></label>
                                          <div class="col-md-8">
                                            <input type="submit"  name="submit"  value="Sign Up"  class="submit btn btn-pup"  />
                                             <button class="btn btn-default" data-dismiss="modal" type=
                                                "button">Close</button> 
                                          </div>
                                        </div>
                                      </div> 



                                        

                                     </div>
                                    <div class="panel-footer">
                                     <a href="<?php echo web_root?>"><img src="images/home/NC LOGO.png" alt="" /></a>
                                    </div> 
                            </div> 
                            <!-- end panel sign up -->
                        </form>  
                   </div> 
              </div>
         
              
          </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  </div>
<!-- end sign up modal -->





<script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 
    </script>


<script>
    const provinceDropdown = document.getElementById('province');
    const locationDropdown = document.getElementById('location');
    const barangayDropdown = document.getElementById('barangay');

    // Function to populate Municipality/City dropdown based on selected Province
    function populateLocations(selectedProvince) {
        locationDropdown.innerHTML = '<option value="">Select Municipality/City</option>'; // Reset the dropdown

        // Make an AJAX request to the API to fetch cities and municipalities for the selected Province
        fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvince}/cities-municipalities/`)
            .then(response => response.json())
            .then(data => {
                data.forEach(location => {
                    // Filter cities and municipalities based on their properties
                    if (location.isCity || location.isMunicipality) {
                        const option = document.createElement('option');
                        option.value = location.code;
                        option.textContent = location.name;
                        locationDropdown.appendChild(option);
                    }
                });
            })
            .catch(error => console.error('Error fetching cities and municipalities:', error));
    }

    // Function to populate Barangay dropdown based on selected Municipality or City
    function populateBarangays(selectedLocation) {
        barangayDropdown.innerHTML = '<option value="">Select Barangay</option>'; // Reset the dropdown


        fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvince}/cities-municipalities/`)
            .then(response => response.json())
            .then(data => {
              data.forEach(location => {
        
        // Make an AJAX request to the API to fetch barangays for the selected Municipality or City
        if (location.isCity == true) {
            fetch(`https://psgc.gitlab.io/api/cities/${selectedLocation}/barangays/`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(barangay => {
                        const option = document.createElement('option');
                        option.value = barangay.code;
                        option.textContent = barangay.name;
                        barangayDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching barangays:', error));
        }else{
          fetch(`https://psgc.gitlab.io/api/municipalities/${selectedLocation}/barangays/`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(barangay => {
                        const option = document.createElement('option');
                        option.value = barangay.code;
                        option.textContent = barangay.name;
                        barangayDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching barangays:', error));

        }
      });
      })
    }

    // Event listeners to handle dropdown changes
    provinceDropdown.addEventListener('change', () => {
        const selectedProvince = provinceDropdown.value;
        populateLocations(selectedProvince);
    });

    locationDropdown.addEventListener('change', () => {
        const selectedLocation = locationDropdown.value;
        const selectedLocationName = locationDropdown.options[locationDropdown.selectedIndex].text;

        // Set the value of the hidden input field
        document.getElementById('SELECTED_LOCATION').value = selectedLocationName;

        populateBarangays(selectedLocation);
    });

    barangayDropdown.addEventListener('change', () => {
        const selectedBarangay = barangayDropdown.value;
        const selectedBarangayName = barangayDropdown.options[barangayDropdown.selectedIndex].text;

        // Set the value of the hidden input field
        document.getElementById('SELECTED_BARANGAY').value = selectedBarangayName;
    });

    // Initialize the Municipality/City dropdown with the specified Province code
    const selectedProvince = provinceDropdown.value;
    populateLocations(selectedProvince);
</script>