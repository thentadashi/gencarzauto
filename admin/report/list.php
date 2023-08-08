<?php
if (!isset($_SESSION['U_ROLE']) || $_SESSION['U_ROLE'] != 'Administrator') {
    redirect(web_root . "admin/index.php");
}
?>

<div class="row" style="margin:0;text-align:center;">
    <form action="index.php" method="post">
        <div class="col-lg-6"></div>
        <div class="col-lg-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group input-group">
                            <label>From:</label>
                            <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any"
                                   data-link-format="yyyy-mm-dd"
                                   name="date_pickerfrom" id="date_pickerfrom"
                                   value="<?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] : ''; ?>"
                                   readonly="true" class="date_pickerfrom input-sm form-control">
                            <span class="input-group-btn">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group">
                            <label>To:</label>
                            <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any"
                                   data-link-format="yyyy-mm-dd"
                                   name="date_pickerto" id="date_pickerto"
                                   value="<?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : ''; ?>"
                                   readonly="true" class="date_pickerto form-control input-sm">
                                    <span class="input-group-btn">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group input-group" style="margin-top:25px;">
                        <button class="btn btn-primary" name="submit" type="submit">Search <i
                                    class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<button class="btn btn-primary" onclick="toggleSection('all', 'onlineOrder', 'walkin')">All</button>
<button class="btn btn-primary" onclick="toggleSection('onlineOrder', 'walkin', 'all')">Online</button>
<button class="btn btn-primary" onclick="toggleSection('walkin', 'onlineOrder', 'all')">Walk In</button>

<div class="row">
<div class="section">
    <div id="all">
    <span id="printout">
        <div class="col-md-12">
            <div class="page-header" style="text-align:center;">
                <h3><b>List of all ordered products</b></h3>
                <div>Inclusive Dates: From: <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] : ''; ?>
                    - To: <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : ''; ?> </div>
            </div>
            <!-- List of ALl -->
            <form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <table id="alltable" class="table table-hover" align="center" cellspacing="10px" style="font-size:15px">
                    <thead>
                    <tr bgcolor="#D9602B" style="color:#111;font-size:12px">
                        <td>Date Ordered</td>
                        <td>Customer name</td>
                        <td>Product</td>
                        <td>Original Price</td>
                        <td>Market Price</td>
                        <td>Quantity</td>
                        <td>Sub-total</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totAmount = 0;
                    $Capital = 0;
                    $totQty = 0;
                    $markupPrice = 0;

                    if (isset($_POST['submit'])) {
						$query = "SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE (ORDEREDSTATS = 'Delivered' OR ORDEREDSTATS = 'PAID') AND DATE(S.ORDEREDDATE) >= '" . date_format(date_create($_POST['date_pickerfrom']), 'Y-m-d') . "'
						AND DATE(S.ORDEREDDATE) <= '" . date_format(date_create($_POST['date_pickerto']), 'Y-m-d') . "'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();

                        if (!isset($cus)) {
                            foreach ($cur as $result) {
                                $Capital += $result->ORIGINALPRICE;
                                $markupPrice += $result->PROPRICE;
                                $price = $result->PROPRICE + $result->DELFEE;
                                $totQty += $result->ORDEREDQTY;
                                $subtotal = $result->ORDEREDQTY * $price;
                               
                                
                                echo '<tr style="color:#111;font-size:12px">
                                    <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                    <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                    <td>' . $result->OWNERNAME . '</td>
                                    <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                    <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                                    <td>' . $result->ORDEREDQTY . '</td>
                                    <td>₱ ' . number_format($subtotal, 2) . '</td>
                                </tr>';

                                $date_pickerfrom = date('Y-m-d', strtotime($_POST['date_pickerfrom']));
                                $date_pickerto = date('Y-m-d', strtotime($_POST['date_pickerto']));
                                
                                $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total 
                                FROM `tblsummary` 
                                WHERE (ORDEREDSTATS = 'Delivered' OR ORDEREDSTATS = 'PAID') 
                                    AND DATE(ORDEREDDATE) >= '$date_pickerfrom' 
                                    AND DATE(ORDEREDDATE) <= '$date_pickerto'
                                ";
                                $mydb->setQuery($query);
                                $cur2 = $mydb->loadResultList();
                                foreach ($cur2 as $result) {
          
                                    $totAmount=$result->Total;
                                }
                            }
                        } else {
                            echo '<tr><td colspan="7" align="center"><h2>Please Enter the Dates</h2></td></tr>';
                        }
                    } else {
						$query="SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						where (ORDEREDSTATS = 'Delivered' OR ORDEREDSTATS = 'PAID')";

                        $mydb->setQuery($query);
                        $curs = $mydb->loadResultList();
                        foreach ($curs as $result) {
                            $Capital += $result->ORIGINALPRICE;
                            $markupPrice += $result->PROPRICE;
                            $price = $result->PROPRICE + $result->DELFEE;
                            $totQty += $result->ORDEREDQTY;
                            $subtotal = $result->ORDEREDQTY * $price;
                            
                            
                            echo '<tr style="color:#111;font-size:12px">
                                <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                <td>' . $result->OWNERNAME . '</td>
                                <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                                <td>' . $result->ORDEREDQTY . '</td>
                                <td>₱ ' . number_format($subtotal, 2) . '</td>
                            </tr>';

                            $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total FROM `tblsummary` where ORDEREDSTATS = 'Delivered' or ORDEREDSTATS = 'PAID'";
                            $mydb->setQuery($query);
                            $cur2 = $mydb->loadResultList();
                            foreach ($cur2 as $result) {
    
                            $totAmount=$result->Total;
                        }
                        }
                    }
                    ?>
                    <tr>
                        <td>Total</td>
                        <td>Capital Price: <?php echo number_format($Capital, 2); ?></td>
                        <td>Market Price: <?php echo number_format($markupPrice, 2); ?></td>
                        <td>Total Qty Ordered: <?php echo $totQty; ?></td>
                        <td>Total Sales: <?php echo number_format($totAmount, 2); ?></td>
						<td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                </form>
            </div>
        </span>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
					<button onclick="tablePrintall();" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintWeekly();" class="btn btn-primary"><i class="fa fa-print"></i> Weekly Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintMonthly();" class="btn btn-primary"><i class="fa fa-print"></i> Monthly Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintAnnually();" class="btn btn-primary"><i class="fa fa-print"></i> PAnnually Report</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
<div class="row">
    <div class="section">
    <div id="onlineOrder" style="display: none;">
    <span id="printout">
        <div class="col-md-12">
            <div class="page-header" style="text-align:center;">
                <h3><b>List of Ordered Products (Online)</b></h3>
                <div>Inclusive Dates: From: <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] : ''; ?>
                    - To: <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : ''; ?> </div>
            </div>
            <!-- List of Online -->
            <form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <table id="list22" class="table table-hover" align="center" cellspacing="10px" style="font-size:15px">
                    <thead>
                    <tr bgcolor="#D9602B" style="color:#111;font-size:12px">
                        <td>Date Ordered</td>
                        <td>Customer name</td>
                        <td>Product</td>
                        <td>Original Price</td>
                        <td>Market Price</td>
                        <td>Quantity</td>
                        <td>Sub-total</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totAmount = 0;
                    $Capital = 0;
                    $totQty = 0;
                    $markupPrice = 0;

                    if(isset($_POST['submit'])) {
						$query = "SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE S.ORDEREDSTATS = 'Delivered'
						AND DATE(S.ORDEREDDATE) >= '" . date_format(date_create($_POST['date_pickerfrom']), 'Y-m-d') . "'
						AND DATE(S.ORDEREDDATE) <= '" . date_format(date_create($_POST['date_pickerto']), 'Y-m-d') . "'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();

                        if (!isset($cus)) {
                            foreach ($cur as $result) {
                                $Capital += $result->ORIGINALPRICE;
                                $markupPrice += $result->PROPRICE;
                                $price = $result->PROPRICE + $result->DELFEE;
                                $totQty += $result->ORDEREDQTY;
                                $subtotal = $result->ORDEREDQTY * $price;
                                
                                echo '<tr style="color:#111;font-size:12px">
                                    <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                    <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                    <td>' . $result->OWNERNAME . '</td>
                                    <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                    <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                                    <td>' . $result->ORDEREDQTY . '</td>
                                    <td>₱ ' . number_format($subtotal, 2) . '</td>
                                </tr>';

                                $date_pickerfrom = date('Y-m-d', strtotime($_POST['date_pickerfrom']));
                                $date_pickerto = date('Y-m-d', strtotime($_POST['date_pickerto']));
                                
                                $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total 
                                FROM `tblsummary` 
                                WHERE (ORDEREDSTATS = 'Delivered') 
                                    AND DATE(ORDEREDDATE) >= '$date_pickerfrom' 
                                    AND DATE(ORDEREDDATE) <= '$date_pickerto'
                                ";
                                $mydb->setQuery($query);
                                $cur2 = $mydb->loadResultList();
                                foreach ($cur2 as $result) {
          
                                    $totAmount=$result->Total;
                                }
                            }
                        } else {
                            echo '<tr><td colspan="7" align="center"><h2>Please Enter the Dates</h2></td></tr>';
                        }
                    } else {
						$query="SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE S.ORDEREDSTATS = 'Delivered'";

                        $mydb->setQuery($query);
                        $curs = $mydb->loadResultList();

                        foreach ($curs as $result) {
                            $Capital += $result->ORIGINALPRICE;
                            $markupPrice += $result->PROPRICE;
                            $price = $result->PROPRICE + $result->DELFEE;
                            $totQty += $result->ORDEREDQTY;
                            $subtotal = $result->ORDEREDQTY * $price;
                            
                            echo '<tr style="color:#111;font-size:12px">
                                <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                <td>' . $result->OWNERNAME . '</td>
                                <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                <td>₱ ' . number_format($price, 2) . '</td>
                                <td>' . $result->ORDEREDQTY . '</td>
                                <td>₱ ' . number_format($subtotal, 2) . '</td>
                            </tr>';

                            $query = "SELECT SUM(PAYMENT) as Total FROM `tblsummary` where ORDEREDSTATS = 'Delivered'";
                            $mydb->setQuery($query);
                            $cur2 = $mydb->loadResultList();
                            foreach ($cur2 as $result) {
    
                            $totAmount=$result->Total;
                        }
                        }
                    }
                    ?>
                    <tr>
                        <td>Total</td>
                        <td>Capital Price: <?php echo number_format($Capital, 2); ?></td>
                        <td>Market Price: <?php echo number_format($markupPrice, 2); ?></td>
                        <td>Total Qty Ordered: <?php echo $totQty; ?></td>
                        <td>Total Sales: <?php echo number_format($totAmount, 2); ?></td>
						<td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                </form>
            </div>
        </span>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
					<button onclick="tablePrint();" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintWeekly();" class="btn btn-primary"><i class="fa fa-print"></i> Weekly Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintMonthly();" class="btn btn-primary"><i class="fa fa-print"></i> Monthly Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintAnnually();" class="btn btn-primary"><i class="fa fa-print"></i> PAnnually Report</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

<div class="row">
    <div class="section">
    <div id="walkin" style="display: none;">
    <span id="printout">
        <div class="col-md-12">
            <div class="page-header" style="text-align:center;">
                <h3><b>List of Ordered Products (Walk-in)</b></h3>
                <div>Inclusive Dates: From: <?php echo isset($_POST['date_pickerfrom']) ? $_POST['date_pickerfrom'] : ''; ?>
                    - To: <?php echo isset($_POST['date_pickerto']) ? $_POST['date_pickerto'] : ''; ?> </div>
            </div>

            <form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <table id="walkintable" class="table table-hover" align="center" cellspacing="10px" style="font-size:15px">
                    <thead>
                    <tr bgcolor="#D9602B" style="color:#111;font-size:12px">
                        <td>Date Ordered</td>
                        <td>Customer name</td>
                        <td>Product</td>
                        <td>Original Price</td>
                        <td>Market Price</td>
                        <td>Quantity</td>
                        <td>Sub-total</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totAmount = 0;
                    $Capital = 0;
                    $totQty = 0;
                    $markupPrice = 0;

                    if (isset($_POST['submit'])) {
						$query = "SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE S.ORDEREDSTATS = 'PAID'
						AND DATE(S.ORDEREDDATE) >= '" . date_format(date_create($_POST['date_pickerfrom']), 'Y-m-d') . "'
						AND DATE(S.ORDEREDDATE) <= '" . date_format(date_create($_POST['date_pickerto']), 'Y-m-d') . "'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();

                        if (!isset($cus)) {
                            foreach ($cur as $result) {
                                $Capital += $result->ORIGINALPRICE;
                                $markupPrice += $result->PROPRICE;
                                $totQty += $result->ORDEREDQTY;
                                $subtotal = $result->ORDEREDQTY * $result->PROPRICE;
                                
                                echo '<tr style="color:#111;font-size:12px">
                                    <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                    <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                    <td>' . $result->OWNERNAME . '</td>
                                    <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                    <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                                    <td>' . $result->ORDEREDQTY . '</td>
                                    <td>₱ ' . number_format($subtotal, 2) . '</td>
                                </tr>';

                                $date_pickerfrom = date('Y-m-d', strtotime($_POST['date_pickerfrom']));
                                $date_pickerto = date('Y-m-d', strtotime($_POST['date_pickerto']));
                                
                                $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total 
                                FROM `tblsummary` 
                                WHERE (ORDEREDSTATS = 'PAID') 
                                    AND DATE(ORDEREDDATE) >= '$date_pickerfrom' 
                                    AND DATE(ORDEREDDATE) <= '$date_pickerto'
                                ";
                                $mydb->setQuery($query);
                                $cur2 = $mydb->loadResultList();
                                foreach ($cur2 as $result) {
          
                                    $totAmount=$result->Total;
                                }


                            }
                        } else {
                            echo '<tr><td colspan="7" align="center"><h2>Please Enter the Dates</h2></td></tr>';
                        }
                    } else {
						$query="SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE S.ORDEREDSTATS = 'PAID'";

                        $mydb->setQuery($query);
                        $curs = $mydb->loadResultList();

                        foreach ($curs as $result) {
                            $Capital += $result->ORIGINALPRICE;
                            $markupPrice += $result->PROPRICE;
                            $totQty += $result->ORDEREDQTY;
                            $subtotal = $result->ORDEREDQTY * $result->PROPRICE;
                            
                            echo '<tr style="color:#111;font-size:12px">
                                <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                <td>' . $result->OWNERNAME . '</td>
                                <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                                <td>' . $result->ORDEREDQTY . '</td>
                                <td>₱ ' . number_format($subtotal, 2) . '</td>
                            </tr>';

                            $query = "SELECT SUM(PAYMENT) as Total FROM `tblsummary` where ORDEREDSTATS = 'PAID'";
                            $mydb->setQuery($query);
                            $cur2 = $mydb->loadResultList();
                            foreach ($cur2 as $result) {
    
                            $totAmount=$result->Total;
                        }
                        }
                    }
                    ?>
                    <tr>
                        <td>Total</td>
                        <td>Capital Price: <?php echo number_format($Capital, 2); ?></td>
                        <td>Market Price: <?php echo number_format($markupPrice, 2); ?></td>
                        <td>Total Qty Ordered: <?php echo $totQty; ?></td>
                        <td>Total Sales: <?php echo number_format($totAmount, 2); ?></td>
						<td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                </form>
            </div>
        </span>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
					<button onclick="tablePrint2();" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintWeekly();" class="btn btn-primary"><i class="fa fa-print"></i> Weekly Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintMonthly();" class="btn btn-primary"><i class="fa fa-print"></i> Monthly Report</button>
                </div>
                <div class="col-md-1" style="margin-right: 10px;">
					<button onclick="tablePrintAnnually();" class="btn btn-primary"><i class="fa fa-print"></i> PAnnually Report</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>


  <script src="../js/jquery.min.js"></script>
    <script>
			function tablePrint() {
    var date_pickerfrom = $('#date_pickerfrom').val();
    var date_pickerto = $('#date_pickerto').val();

    // Construct the URL with the parameters
    var url = "print.php?date_pickerfrom=" + date_pickerfrom + "&date_pickerto=" + date_pickerto + "&status=Delivered";

    // Open the print page in a new tab
    window.open(url, "_blank");
}

        $(document).ready(function () {
            oTable = jQuery('#list22').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayLength": 10, // Number of records to show per page
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        });

        $(document).ready(function () {
            oTable = jQuery('#alltable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayLength": 10, // Number of records to show per page
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        });
        $(document).ready(function () {
            oTable = jQuery('#walkintable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayLength": 10, // Number of records to show per page
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        });
    </script>

<script>

function tablePrint2() {
    var date_pickerfrom = $('#date_pickerfrom').val();
    var date_pickerto = $('#date_pickerto').val();

    // Construct the URL with the parameters
    var url = "print.php?date_pickerfrom=" + date_pickerfrom + "&date_pickerto=" + date_pickerto + "&status=PAID";

    // Open the print page in a new tab
    window.open(url, "_blank");
}

function tablePrintWeekly() {
    var date_pickerfrom = $('#date_pickerfrom').val();
    var date_pickerto = $('#date_pickerto').val();

    // Construct the URL with the parameters
    var url = "printWeekly.php";

    // Open the print page in a new tab
    window.open(url, "_blank");
}

function tablePrintMonthly() {
    var date_pickerfrom = $('#date_pickerfrom').val();
    var date_pickerto = $('#date_pickerto').val();

    // Construct the URL with the parameters
    var url = "printMonthly.php";

    // Open the print page in a new tab
    window.open(url, "_blank");
}

function tablePrintAnnually() {
    var date_pickerfrom = $('#date_pickerfrom').val();
    var date_pickerto = $('#date_pickerto').val();

    // Construct the URL with the parameters
    var url = "printAnnually.php";

    // Open the print page in a new tab
    window.open(url, "_blank");
}

function tablePrintall() {
    var date_pickerfrom = $('#date_pickerfrom').val();
    var date_pickerto = $('#date_pickerto').val();

    // Construct the URL with the parameters
    var url = "print2.php?date_pickerfrom=" + date_pickerfrom + "&date_pickerto=" + date_pickerto;

    // Open the print page in a new tab
    window.open(url, "_blank");
}


        $(document).ready(function () {
            oTable = jQuery('#list').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "iDisplayLength": 10, // Number of records to show per page
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        });
    </script>

<script>
        function toggleSection(sectionId, oppositeSectionId,oppositeSectionId2) {
            var section = document.getElementById(sectionId);
            var oppositeSection = document.getElementById(oppositeSectionId);
            var oppositeSection2 = document.getElementById(oppositeSectionId2);

            if (section.style.display === "none") {
                section.style.display = "block";
                oppositeSection.style.display = "none";
                oppositeSection2.style.display = "none";
            } else {
                section.style.display = "none";
            }
        }
    </script>
</html>
