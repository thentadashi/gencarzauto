<?php

  require_once ("../../include/initialize.php");
  $autonumber = new Autonumber();
  $res = $autonumber->set_autonumber('ordernumber');

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    /* Additional styles for the modal */
    .modal-dialog {
     margin-top: 100px;
      max-width: 400px;
      border-radius: 0;
    }
    .dotted-hr {
      border-top: 1px dotted #ccc;
    }
    .light-font {
      font-weight: normal;
    }
    .gray-bg {
      background-color: #ccc;
    }
    .custom-padding th {
      padding: 5px; /* Adjust the value as needed */
    }
    .table td, .table th, .table tbody {
    padding: 0.3rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    }
    hr {
    margin-top: .5rem;
    margin-bottom: .5rem;
    border: 0;
    }
  </style>
</head>
<body>
  <!-- The modal -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="modal-header">Print Receipt</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group text-center">
                <img src="../images/2.png" class="mx-auto" width="70px"/>
            </div>
            <hr class="dotted-hr">
            <p class="text-center" style="font-size:18px;">Gencarz Unlimited</p>
            <p class="text-center" style="font-size:14px;margin-top:-15px;">Poblacion West, Asingan Pangasinan</p>
            <p class="text-center" style="font-size:14px;margin-top:-20px;">Phone: +63 917 332 6808 </p>
            <p class="text-center" style="font-size:14px;margin-top:-20px;">Email: gencarz@gmail.com </p>
            <hr class="dotted-hr">
            <p class="text-center" style="font-size:17px;">Order Details</p>
            <div class="row">
                <div class="col-lg-7">
                    <p style="font-size:14px;margin-top:-15px;" id="orderNum"></p>
                    <p style="font-size:14px;margin-top:-15px;" id="customerName"></p>
                    <p style="font-size: 14px;margin-top:-15px" id="paymentMethod"></p>
                </div>
                <div class="col-lg-5">
                <p style="font-size:14px;margin-top:-15px;">Date:  <?php echo date("F j Y"); ?></p>
                </div>
            </div>
            <table class="table" style="font-size:12px;">
                <thead class="gray-bg">
                <tr class="custom-padding">
                    <th class="light-font" width="10%">#</th>
                    <th class="light-font" width="30%">Items</th>
                    <th class="light-font">Qty</th>
                    <th class="light-font">Rate</th>
                    <th class="light-font">Total</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
            <hr class="dotted-hr">
                <div class="align-content-end d-flex justify-content-end" style="margin-right:2.5rem;">
                    <div>
                        <p style="font-size: 14px;margin-top:-5px;" id="ordertax"></p>
                    </div>
                </div>
                <div class="align-content-end d-flex justify-content-end" style="margin-right:2.5rem;">
                    <div>
                        <p style="font-size: 14px;margin-top:-15px;" id="discount"></p>
                    </div>
                </div>
                <div class="align-content-end d-flex justify-content-end" style="margin-right:2.5rem;">
                    <div>
                        <p style="font-size: 14px;margin-top:-15px;" id="subtotal"></p>
                    </div>
                </div>
            <hr class="dotted-hr">
            <div class="row">
                <div class="col-lg-3">
                    <p style="font-size:14px;" id="tqty"></p>
                </div>
                <div class="col-lg-3">
                    <p style="font-size:14px;" id="qty"></p>
                </div>
                <div class="col-lg-6">
                    <p style="font-size:14px;margin-left:20px;" id="gtotal"></p>
                </div>
            </div>
            <hr class="dotted-hr">
            <div class="align-content-end d-flex justify-content-end">
                    <div class="align-content-end d-flex justify-content-end">
                        <p style="font-size: 14px;margin-right:40px;" id="gtotal2"></p>
                    </div>
            </div>
            <div class="align-content-end d-flex justify-content-end">
                <p style="font-size: 14px;margin-top:-15px;margin-right:40px;" id="paidAmount"></p>
            </div>
            <div class="align-content-end d-flex justify-content-end">
                        <p style="font-size: 14px;margin-top:-15px;margin-right:40px;" id="change"></p>
            </div>
            <hr class="dotted-hr">
            <p class="text-center" style="font-size:15px;">Thank you for shopping @Gencarz Unlimited!</p>
            <div class="form-group text-center">
                <img src="../images/NCLOGO.png" class="mx-auto" width="150px"/>
            </div>
            <div class="align-content-center d-flex justify-content-center">
                <button id="printButton" style="border-color:#D9602B;color:white;background-color:#D9602B;"><i class="bi bi-printer-fill"></i> Print receipt</button>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // JavaScript to handle modal functionality

    // Function to open the modal
    function openModal() {
      // Retrieve the data from the URL parameters
      const urlParams = new URLSearchParams(window.location.search);
      const data = JSON.parse(urlParams.get('data'));

      // Access the customer name and product details
      const customerName = data.customerName || '';
      const orderNum = data.orderNum || '';
      const products = data.products || [];

      // Set the customer name in the modal
      document.getElementById('customerName').textContent = `Customer: ${customerName}`;
      document.getElementById('orderNum').textContent = `Order: ${orderNum}`;

      // Populate the product details in the modal
      const tableBody = document.querySelector('table tbody');
        tableBody.innerHTML = '';
        let totalItems = 0;
        products.forEach((product, index) => {
        const productName = product.name;
        const quantity = product.quantity;
        const rate = product.rate;
        const total = product.total;
        const taxed = product.taxed;
        const discounted = product.discounted;
        const tqty = product.tqty;
        const gtotal = product.gtotal;
        const gtotal2 = product.gtotal2;
        const subtotal = product.subTotal;
        const paymentMethod = product.paymentMethod;
        const paidAmount = product.paidAmount;
        const change = product.change;
        const row = document.createElement('tr');
        row.style.fontSize = '11px';



        totalItems += 1;
        document.getElementById("tqty").textContent = "Items: " + tqty;
        document.getElementById("qty").textContent = "Qty: " + totalItems;
        document.getElementById("discount").textContent = "Discount: " + discounted;
        document.getElementById("ordertax").textContent = "Order Tax: " + taxed;
        document.getElementById("gtotal").textContent = "Total: " + gtotal;
        document.getElementById("change").textContent = "Change: " + change;
        document.getElementById("subtotal").textContent = "Sub total: " + subtotal;
        document.getElementById("paymentMethod").textContent = "Payment method: " + paymentMethod;
        document.getElementById("gtotal2").textContent = "Due amount: " + gtotal2;
        const formattedPaidAmount = Number(paidAmount).toLocaleString('en-US', {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        document.getElementById("paidAmount").textContent = "Paid amount: ₱ " + formattedPaidAmount;



        const indexCell = document.createElement('td');
        indexCell.textContent = index + 1;
        row.appendChild(indexCell);

        const nameCell = document.createElement('td');
        nameCell.textContent = productName;
        row.appendChild(nameCell);

        const quantityCell = document.createElement('td');
        quantityCell.textContent = quantity;
        row.appendChild(quantityCell);

        const rateCell = document.createElement('td');
        // Set the rate value if available
        rateCell.textContent = rate; // Uncomment this line and replace `rate` with the actual rate value
        row.appendChild(rateCell);

        const totalCell = document.createElement('td');
        totalCell.textContent = total; // Example style: set padding to 10px
        row.appendChild(totalCell);



        tableBody.appendChild(row);
        });


      // Show the modal
      $('#myModal').modal('show');
    }

    // Call the openModal function when the page is loaded
    $(document).ready(function() {
      openModal();
    });
    function handlePrintButtonClick() {
      // Hide the print button so it doesn't appear on the printed page
      const printButton = document.getElementById('printButton');
      const modalheader = document.getElementById('modal-header');
      printButton.style.display = 'none';
      modalheader.style.display = 'none';


      // Call the print function
      window.print();

      // Show the print button again after printing is done
      printButton.style.display = 'block';
    }

    // Attach the print button click event handler
    document.getElementById('printButton').addEventListener('click', handlePrintButtonClick);

    // Function to close the whole page
    function closePage() {
      window.open('', '_self').close();
    }

    // Attach the closePage function to the close button click event
    document.querySelector('#myModal .close').addEventListener('click', closePage);

  </script>
</body>
</html>
