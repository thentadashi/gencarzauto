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
    <div>
        Weekly Report
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
                        $query="SELECT *
						FROM tblproduct P
						INNER JOIN tblpromopro PR ON P.PROID = PR.PROID
						INNER JOIN tblorder O ON PR.PROID = O.PROID
						INNER JOIN tblsummary S ON O.ORDEREDNUM = S.ORDEREDNUM
						INNER JOIN tblcustomer C ON S.CUSTOMERID = C.CUSTOMERID
						WHERE S.ORDEREDSTATS = 'Delivered' or S.ORDEREDSTATS = 'PAID' AND S.ORDEREDDATE >= DATE(NOW()) - INTERVAL 365 DAY";
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

                            $query = "SELECT SUM(DELFEE) + SUM(PAYMENT) as Total FROM `tblsummary` where ORDEREDSTATS = 'Delivered' or ORDEREDSTATS = 'PAID' AND ORDEREDDATE >= DATE(NOW()) - INTERVAL 365 DAY";
                            $mydb->setQuery($query);
                            $cur2 = $mydb->loadResultList();
                            foreach ($cur2 as $result) {
    
                            $totalAmount=$result->Total;
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
