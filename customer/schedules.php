                            <div class="table-responsive" style="margin-top:5%;">
                                <form action="customer/controller.php?action=delete" method="post">
                                    <table cellspacing="0" class="table table-striped table-bordered table-hover" id="example2" style="font-size:12px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sched. no.</th>
                                                <th>Time</th>
                                                <th>Date</th>
                                                <th>Estimated Price</th>
                                                <th>Mechanic</th>
                                                <th width="150px">Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $query = "SELECT s.*
                                            FROM tblschedule s
                                            WHERE s.CUSTOMERID = ".$_SESSION['CUSID']." 
                                            ORDER BY s.sched_id DESC";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {


                                                $timeRange = $result->time; // Assuming $result->date contains the time range in the format "hh:mm - hh:mm"

                                                // Split the time range into start and end times
                                                $times = explode(" - ", $timeRange);
                                                $startTime = $times[0];
                                                $endTime = $times[1];
                                                
                                                // Convert the start time to AM/PM format
                                                $startTimeParts = explode(":", $startTime);
                                                $startHour = intval($startTimeParts[0]);
                                                $startMinute = intval($startTimeParts[1]);
                                                $startPeriod = ($startHour < 12) ? "AM" : "PM";
                                                $startHour = ($startHour > 12) ? ($startHour - 12) : $startHour;
                                                $startTimeAMPM = $startHour . ":" . sprintf("%02d", $startMinute) . " " . $startPeriod;
                                                
                                                // Convert the end time to AM/PM format
                                                $endTimeParts = explode(":", $endTime);
                                                $endHour = intval($endTimeParts[0]);
                                                $endMinute = intval($endTimeParts[1]);
                                                $endPeriod = ($endHour < 12) ? "AM" : "PM";
                                                $endHour = ($endHour > 12) ? ($endHour - 12) : $endHour;
                                                $endTimeAMPM = $endHour . ":" . sprintf("%02d", $endMinute) . " " . $endPeriod;
                                                
                                                // Concatenate the formatted start and end times
                                                $formattedTimeRange = $startTimeAMPM . " - " . $endTimeAMPM;
                                        ?>
                                        <tr>
                                            <td width="2%"></td>
                                            <td width="12%">
                                            <a href="#"  title="View list Of Booked Schedule"  class="sched_id"  data-target="#mySched" data-toggle="modal" data-id="<?php echo  $result->sched_id; ?>"><?php echo  $result->sched_id; ?> <i class="fa fa-info-circle fa-fw"></i></a></td>
                                            <!-- <a href="#"  title="View list Of ordered products"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>"><i class="fa fa-info-circle fa-fw"></i><?php echo  $result->ORDEREDNUM; ?></a> --></td>
                                            <td width="20%">
                                            <?php echo  $formattedTimeRange; ?></td>
                                            <td width="20%">
                                            <?php echo date_format(date_create($result->date),"M/d/Y") ; ?></td>
                                            <td>&#8369
                                            <?php echo  number_format($result->price); ?></td>
                                            <td width="10%">
                                            <?php echo  $result->mech_name; ?></td>
                                            <td>



                                            <?php 


                                                                echo $result->remarks;


                                            ?>




                                            </td>



                                            <td class="tooltip-demo">
                                            <?php if ($result->remarks == "Pending") {?>
                                            <a href="#" class="btn-xs btn-danger" data-toggle="modal" data-target="#cancelModal2" data-link="<?php echo web_root ; ?>customer/controller.php?action=cancelBooking&id=<?php echo $result->sched_id;?>&customerid=<?php echo $result->CUSTOMERID;?>&req=Requested">Cancel</a>
                                            <?php };?>
                                        </tr><?php
                                                                       
                                                                        } 
                                                                        ?>
                                    </tbody>
                                </table>
                            </form> 
                        </div><!--/table-resp-->

                        <div id="cancelModal2" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cancel Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Please select a reason for canceling:</p>
                                <select class="form-control" id="cancelReason2">
                                <option value="reason1">Change of Mind</option>
                                <option value="reason2">Found a Better Deal</option>
                                <option value="reason3">Conflict in Schedule</option>
                                <option value="other">Other</option>
                                </select>
                                <input type="text" class="form-control mt-3" id="otherReason2" placeholder="Enter other reason" style="display: none;margin-top:15px;">
                            </div>
                            <div class="modal-footer">
                                <button id="confirmCancel2" class="btn btn-primary">Confirm Cancel</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>


                        <script>
                            document.addEventListener("click", function(event) {
                            if (event.target.classList.contains("sched_id")) {
                                var s_id = event.target.getAttribute("data-id");

                                var xhr = new XMLHttpRequest();
                                xhr.open("POST", "customer/listbookservices.php", true);
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    var data = xhr.responseText;
                                    document.getElementById("mySched").innerHTML = data;
                                }
                                };
                                xhr.send("sched_id=" + encodeURIComponent(s_id));
                            }
                            });
                        </script>


                        <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                var cancelLink = '';
                                var cancelReasonSelect = document.getElementById('cancelReason2');
                                var otherReasonInput = document.getElementById('otherReason2');
                                var confirmCancelBtn = document.getElementById('confirmCancel2');
                                var cancelModalLink = document.querySelector('a[data-target="#cancelModal2"]');

                                cancelReasonSelect.addEventListener('change', function() {
                                    var selectedReason = this.value;
                                    if (selectedReason === 'other') {
                                    otherReasonInput.style.display = 'block';
                                    } else {
                                    otherReasonInput.style.display = 'none';
                                    }
                                });

                                confirmCancelBtn.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    
                                    var cancelReason = cancelReasonSelect.value;
                                    if (cancelReason === 'other') {
                                    cancelReason = otherReasonInput.value;
                                    }
                                    
                                    var newLink = cancelLink + '&reason=' + cancelReason;
                                    window.location.href = newLink;
                                });

                                cancelModalLink.addEventListener('click', function() {
                                    cancelLink = this.getAttribute('data-link');
                                });
                                });

                        </script>

<script>
	function tablePrint2(){ 
 // document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,table=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout2").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<style>tr, th { font-size: 12px; }</style><body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
     // document.all.divButtons.style.visibility = 'Show';  
   
    return false; 

    } 
 
</script>