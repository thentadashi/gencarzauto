<?php
require_once("../../include/initialize.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Data</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Calibri, Arial, sans-serif;
            font-size: 8px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h3>List of Ordered Products</h3>
    <div>Inclusive Dates: From: <?php echo isset($_GET['date_pickerfrom']) ? $_GET['date_pickerfrom'] : ''; ?>
        - To: <?php echo isset($_GET['date_pickerto']) ? $_GET['date_pickerto'] : ''; ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date Ordered</th>
                <th>Customer Name</th>
                <th>Product</th>
                <th>Original Price</th>
                <th>Market Price</th>
                <th>Quantity</th>
                <th>Sub-total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                        $date_pickerfrom = isset($_GET['date_pickerfrom']) ? $_GET['date_pickerfrom'] : '';
                        $date_pickerto = isset($_GET['date_pickerto']) ? $_GET['date_pickerto'] : '';
                        $status = isset($_GET['status']) ? $_GET['status'] : '';

                        if($_GET['date_pickerto']==''){

                        $query="SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE S.ORDEREDSTATS = '$status'";
                        $totalQty = 0;
                        $totalAmount = 0;
                        

                        $mydb->setQuery($query);
                        $curs = $mydb->loadResultList();

                        foreach ($curs as $result) {
                            echo '<tr style="color:#111;font-size:12px">
                                <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                                <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                                <td>' . $result->OWNERNAME . '</td>
                                <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                                <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                                <td>' . $result->ORDEREDQTY . '</td>
                                <td>₱ ' . number_format($result->ORDEREDPRICE, 2) . '</td>
                            </tr>';

                            $totalQty += $result->ORDEREDQTY;
                            $subtotal = $result->ORDEREDQTY * $result->PROPRICE;

                            $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total FROM `tblsummary` where ORDEREDSTATS = '$status'";
                            $mydb->setQuery($query);
                            $cur2 = $mydb->loadResultList();
                            foreach ($cur2 as $result) {
    
                            $totalAmount=$result->Total;
                        }
                        }
            }else{
            // Fetch data based on the date range

            // Convert date format from mm/dd/yyyy to yyyy-mm-dd
            $date_pickerfrom = date('Y-m-d', strtotime($date_pickerfrom));
            $date_pickerto = date('Y-m-d', strtotime($date_pickerto));

            $query = "SELECT *
            FROM tblproduct P
            INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
            INNER JOIN tblorder O ON PR.PROID = O.PROID
            INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
            INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
            WHERE S.ORDEREDSTATS = '$status'
            AND DATE(S.ORDEREDDATE) >= '$date_pickerfrom'
            AND DATE(S.ORDEREDDATE) <= '$date_pickerto'";

            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();

            $totalQty = 0;
            $totalAmount = 0;

            foreach ($cur as $result) {
                echo '<tr>
                          <td>' . date_format(date_create($result->ORDEREDDATE), 'M/d/Y h:i:s') . '</td>
                          <td>' . $result->FNAME . ' ' . $result->LNAME . '</td>
                          <td>' . $result->OWNERNAME . '</td>
                          <td>₱ ' . number_format($result->ORIGINALPRICE, 2) . '</td>
                          <td>₱ ' . number_format($result->PROPRICE, 2) . '</td>
                          <td>' . $result->ORDEREDQTY . '</td>
                          <td>₱ ' . number_format($result->ORDEREDPRICE, 2) . '</td>
                      </tr>';

                      $totalQty += $result->ORDEREDQTY;
                      $subtotal = $result->ORDEREDQTY * $result->PROPRICE;
                      
                      $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total 
                      FROM `tblsummary` 
                      WHERE ORDEREDSTATS = '$status'
                          AND DATE(ORDEREDDATE) >= '$date_pickerfrom' 
                          AND DATE(ORDEREDDATE) <= '$date_pickerto'
                      ";
                      $mydb->setQuery($query);
                      $cur2 = $mydb->loadResultList();
                      foreach ($cur2 as $result) {

                      $totalAmount=$result->Total;
                  }
            }
        }
            ?>

            <tr>
                <td colspan="6">Total Qty Ordered: <?php echo $totalQty; ?></td>
                <td colspan="1">Total Sales: ₱ <?php echo number_format($totalAmount, 2); ?></td>
            </tr>
        </tbody>
        <tfoot>

        </tfoot>
    </table>

    <script>
        // Automatically print the page when loaded
        window.onload = function() {
            window.print();
        };
        window.addEventListener('afterprint', function() {
            window.close();
        });
    </script>
</body>
</html>
