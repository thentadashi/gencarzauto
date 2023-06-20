                            <div class="table-responsive" style="margin-top:5%;">
                                <form action="customer/controller.php?action=delete" method="post">
                                    <table cellspacing="0" class="table table-striped table-bordered table-hover" id="example2" style="font-size:12px">
                                        <thead>
                                            <tr>
                                                <th>Schedule Number</th>
                                                <th>Schedule Id</th>
                                                <th>Date Scheduled</th>
                                                <th>Estimated Price</th>
                                                <th>Service Type</th>
                                                <th width="150px">Remarks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $query = "SELECT s.*, t.*
                                            FROM tblschedule s
                                            INNER JOIN services t ON s.serv_id = t.serv_id
                                            WHERE s.CUSTOMERID = ".$_SESSION['CUSID']." 
                                            ORDER BY s.sched_id DESC";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {
                                        ?>
                                        <tr>
                                            <td width="2%"></td>
                                            <!--   <td width="10%"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>">
                            <a href="#"  title="View list Of ordered products"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>"><i class="fa fa-info-circle fa-fw"></i> view orders</a> 
                         </td> -->
                                            <!-- <td> <a href="#" class="get-id"  data-target="#myModal" data-toggle="modal" data-id="<?php echo  $result->ORDERNUMBER; ?>"><?php echo  $result->ORDERNUMBER; ?></a>
                               </td> -->
                                            <td>
                                            <?php echo  $result->sched_id; ?>
                                            <!-- <a href="#"  title="View list Of ordered products"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDEREDNUM; ?>"><i class="fa fa-info-circle fa-fw"></i><?php echo  $result->ORDEREDNUM; ?></a> --></td>
                                            <td width="20%">
                                            <?php echo date_format(date_create($result->date),"M/d/Y") ; ?></td>
                                            <td>&#8369
                                            <?php echo  number_format($result->serv_price); ?></td>
                                            <td width="20%">
                                            <?php echo  $result->serv_name; ?></td>
                                            <td>



                                            <?php 


                                                                echo $result->remarks;


                                            ?>




                                            </td>



                                            <td class="tooltip-demo">
                                                <a class=
                                                "orderid btn btn-pup btn-xs"
                                                data-id=
                                                "<?php echo $result->sched_id; ?>"
                                                data-target="#myOrdered"
                                                data-toggle="modal" href="#"
                                                title=
                                                "View list Of Scheduled Services">
                                                <i class=
                                                "fa fa-info-circle fa-fw"
                                                data-placement="left"
                                                data-toggle="tooltip" title=
                                                "View Schedule" style="color:#D9602B;"></i> <span class=
                                                "tooltip tooltip.top">view</span></a>
                                            
                                            </td>
                                        </tr><?php
                                                                       
                                                                        } 
                                                                        ?>
                                    </tbody>
                                </table>
                            </form> 
                        </div><!--/table-resp-->