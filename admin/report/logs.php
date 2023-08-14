<div class="table-responsive">
    <?php
    if (!isset($_SESSION['USERID'])){
        redirect(web_root."admin/index.php");
    }

    check_message();
    ?>

    <div class="row" width="100%">
        <div class="col-lg-2">
            <h3 class="page-header"><b>Logs</b></h3>
        </div>
    </div>

    <!-- Table to display logs -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Transaction #</th>
                <th>Customer Name</th>
                <th>Transact By</th>
                <th>Transact Amount</th>
                <th>Transact Status</th>
                <th>Transaction Date</th>
                <!-- Add more table headers for other fields if needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT 
                    s.SUMMARYID, s.CUSTOMERID, s.ORDEREDDATE, s.PAYMENT, s.ORDEREDSTATS,
                    c.FNAME, c.LNAME,
                    u.USERID, u.U_USERNAME
                FROM tblsummary s
                JOIN tblcustomer c ON s.CUSTOMERID = c.CUSTOMERID
                LEFT JOIN tbluseraccount u ON s.USERID = u.USERID
                WHERE 1
            ";

            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
            foreach ($cur as $row) {
                echo "<tr>";
                echo "<td>" . $row->SUMMARYID . "</td>"; 
                echo "<td>" . $row->FNAME . " " . $row->LNAME . "</td>";
                echo "<td>" . ($row->U_USERNAME ? $row->U_USERNAME : 'Unknown User') . "</td>";
                echo "<td>" . $row->PAYMENT . "</td>"; 
                echo "<td>" . $row->ORDEREDSTATS . "</td>"; 
                echo "<td>" . $row->ORDEREDDATE . "</td>"; 
                // Add more table data cells for other fields if needed
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
