<?php
require_once("../../include/initialize.php");
//checkAdmin();
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

     $autonumber = new Autonumber();
      $res = $autonumber->set_autonumber('ordernumber');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Point of Sale</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .product-card {
      cursor: pointer;
    }

    /* Fixed height and scrollbar for the order list */
    #order-list-container {
      height: 400px;
      overflow-y: auto;
      border: 1px solid #dee2e6;
    }
    
    #category-list {
      height: 60px;
      overflow-x: auto;
      animation: none !important;
      transition: none !important;
    }

    #product-list {
      height: 700px;
      overflow-y: auto;
      overflow-x: hidden;
    }

    /* Fixed width for the "Product" column */
    #order-list th:first-child,
    #order-list td:first-child {
      width: 200px;
    }

    .hidden {
      display: none;
    }

  </style>
</head>
<body>

  <div class="container">
    <nav class="navbar fixed-top bg-dark bg-body-tertiary p-2 g-col-6">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="../Dashboard/index.php"> <h4><i class="bi bi-box-arrow-in-left"></i> Point of Sale</h4></a>
        </div>
    </nav>
    <div class="row" style="margin-top:7rem;">
      <div class="col-md-5">
        <h3>Order List</h3>
        <div style="margin-bottom:20px;">
          <h6>Customer Details</h6>
          <input type="text" class="form-control quantity-input" id="name" name="name" placeholder="Input Customer Name" required/>
          <small id="nameError" class="text-danger"></small>
          <select id="customer-list" class="form-select hidden" size="2" style="color:#111; position: relative; z-index: 1;">
          </select>
          <input type="hidden" id="customerID" name="customerID"/>
          <input type="hidden" id="orderNum" name="orderNum" value="<?php echo $res->AUTO;?>"/>
        </div>
        <div id="order-list-container">
          <table class="table" id="order-list">
            <thead>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group dropup">Discount%</label>
                        <select class="form-select" id="payment-discount">
                          <option value="0">0</option>
                              <option value=".05">5%</option>
                              <option value=".12">12%</option>
                              <option value=".15">15%</option>
                          </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group dropup">
                        <label for="payment-vat">Vat %</label>
                        <select class="form-select" id="payment-vat">
                            <option value="0">0</option>
                            <option value=".05">5%</option>
                            <option value=".12">12%</option>
                            <option value=".15">15%</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total-price">Total Price</label>
                        <label class="form-control" id="total-price">₱ 0.00</label>
                    </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button class="btn btn-warning mt-4 w-100" id="print-btn"><b><i class="bi bi-cash-stack"></i> Pay</b></button>
                    </div>
                  </div>
            </div>
            
      </div>
      <div class="col-md-7">
        <h2 style="margin-left:10px;">Product List</h2>
        <div class="container">
          <h6 style="margin-left:10px;">Category</h6>
            <div id="category-list" style="overflow-x: auto;">
              <div class="row d-flex flex-nowrap">
                <div class="col">
                  <button class="btn btn-outline-dark mb-1 active" style="font-size:.8rem;" data-category="All">All</button>
                </div>
                <?php
                  $query = "SELECT * FROM `tblcategory`";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                ?>
                  <div class="col">
                      <button class="btn btn-outline-dark mb-1 text-small" style="font-size:.8rem;" data-category="<?php echo $result->CATEGID; ?>">
                      <?php echo $result->CATEGORIES; ?>
                    </button>
                  </div>
                <?php } ?>
              </div>
            </div>

            <div id="product-list">
              <div class="row">
                <?php
                  $query = "SELECT * FROM `tblproduct`
                  WHERE 1";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                ?>
                <div class="card product-card col-lg-4" style="margin-left:15px;margin-top:10px;width:210px;" data-product="<?php echo $result->OWNERNAME; ?>" data-proid="<?php echo $result->PROID; ?>" data-price="<?php echo $result->PROPRICE;?>" data-qty="<?php echo $result->PROQTY;?>">
                  <div class="card-body">
                    <p class="card-title" style="font-size:1rem;margin-bottom:15px;"><?php echo $result->OWNERNAME; ?></p>
                    <img src="../products/<?php echo $result->IMAGES;?>" class="form-control" style="margin-bottom:15px;"/>
                    <span class="btn-sm btn-warning text-dark form-control" style=""><strong>₱ <?php echo number_format($result->PROPRICE,2);?></strong></span>
                  </div>
                </div>
                <?php       }?>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>


                    <?php include('payment-modal.php')?>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  let selectedCustomerData = null;

  document.addEventListener('DOMContentLoaded', function() {
    let productCards = document.querySelectorAll('.product-card');
    const orderList = document.querySelector('#order-list tbody');
    const totalLabel = document.querySelector('#total-price');
    const categoryButtons = document.querySelectorAll('#category-list button');

    // Function to check if the product already exists in the order list
    function isProductInOrderList(product) {
      const existingRows = orderList.querySelectorAll('tr');
      for (let i = 0; i < existingRows.length; i++) {
        const productName = existingRows[i].querySelector('.product-name').textContent;
        if (productName === product) {
          return existingRows[i];
        }
      }
      return null;
    }

    // Function to create an audio element for the beep sound
    function createBeepSound() {
      const beepSound = new Audio('sound/beep-sound-8333.mp3');
      beepSound.currentTime = 0;
      return beepSound;
    }

    // Function to update the quantity and total price for an existing product in the order list
    function updateQuantityAndTotal(row, quantity) {
      const quantityInput = row.querySelector('.quantity-input');
      const priceCell = row.querySelector('.price');
      const totalCell = row.querySelector('.total');
      const price = parseFloat(row.getAttribute('data-price'));
      const totalPrice = price * quantity;
      totalQuantity += quantity;
      quantityInput.value = quantity;
      totalCell.textContent = '₱ ' + totalPrice.toFixed(2);
      calculateTotalPrice();
    }

    // Function to calculate the total price for a given quantity and price
      function calculateTotalPrice() {
      const rows = orderList.querySelectorAll('tr');
      let totalPrice = 0;
      let totalWithVat = 0;
      let gtotal = 0;
      let vat = document.getElementById('payment-vat').value;
      let discount = document.getElementById('payment-discount').value;

      rows.forEach(function(row) {
        const quantity = parseInt(row.querySelector('.quantity-input').value);
        const price = parseFloat(row.getAttribute('data-price'));
        totalPrice += quantity * price;
        totalWithVat = totalPrice * vat;
        discounted = totalPrice * discount;
        gtotal = totalPrice + totalWithVat - discounted;
      });

      function formatNumberWithCommas(number) {
        return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      totalLabel.textContent = '₱ ' + formatNumberWithCommas(gtotal);

      console.log(totalLabel.textContent);  // Output: ₱ 10,000.00

    }

    

    // Add click event listener to each product card
    productCards.forEach(function(card) {
  const beepSound = createBeepSound();

  card.addEventListener('click', function() {
    beepSound.play();
    const product = this.getAttribute('data-product');
    const price = parseFloat(this.getAttribute('data-price'));
    const qty = parseInt(this.getAttribute('data-qty'));
    const proid = parseInt(this.getAttribute('data-proid'));

    // Check if the product already exists in the order list
    const existingRow = isProductInOrderList(product);

    if (existingRow) {
      // If the product already exists, increment the quantity
      const quantityInput = existingRow.querySelector('.quantity-input');
      let quantity = parseInt(quantityInput.value);

      if (quantity < qty) {
        // Check if quantity hasn't reached the limit
        quantity += 1;
        if (quantity <= qty) {
          // Update the quantity only if it's within the limit
          quantityInput.value = quantity;
          const totalPrice = price * quantity;
          existingRow.querySelector('.total').textContent = '₱ ' + totalPrice.toFixed(2);
        }
      } else {
        alert('Quantity limit reached for this product!');
      }
    } else {
      // If the product doesn't exist, create a new row in the order list
      const newRow = document.createElement('tr');
      newRow.setAttribute('data-price', price.toFixed(2));
      const formattedPrice = price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      newRow.innerHTML = `
        <td class="product-name" style="font-size:.8rem;" width="20%"><input type="hidden" id="proid" name="proid" value="${proid}">${product}</td>
        <td width="10%">
          <input type="number" style="font-size:.8rem;" class="form-control quantity-input" value="1" min="1" max="${qty}" data-tbqty="${qty}">
        </td>
        <td width="16%" class="price" style="font-size:.8rem;">₱ ${formattedPrice}</td>
        <td width="16%" class="total" style="font-size:.8rem;">₱ ${formattedPrice}</td>
        <td width="20%">
          <button class="btn btn-danger btn-sm cancel-button" style="font-size:.8rem;">Remove <i class="bi bi-trash3"></i></button>
        </td>
      `;
      orderList.appendChild(newRow);
    }

    calculateTotalPrice();

    const paymentVatInput = document.querySelector('#payment-vat');
    paymentVatInput.addEventListener('change', calculateTotalPrice);

    const paymentDisInput = document.querySelector('#payment-discount');
    paymentDisInput.addEventListener('change', calculateTotalPrice);

    // Prevent input greater than quantity limit
    const quantityInputs = document.querySelectorAll('.quantity-input');
    quantityInputs.forEach(function(quantityInput) {
      quantityInput.addEventListener('change', function() {
        const inputQuantity = parseInt(quantityInput.value);
        if (inputQuantity > qty) {
          alert('Quantity limit reached for this product!');
          quantityInput.value = qty; // Reset to remaining quantity
        }
      });
    });
  });
});



    // Add input event listener to quantity inputs
    orderList.addEventListener('input', function(event) {
      if (event.target.classList.contains('quantity-input')) {
        const row = event.target.closest('tr');
        const quantity = parseInt(event.target.value);
        const price = parseFloat(row.getAttribute('data-price'));
        const totalPrice = price * quantity;
        row.querySelector('.total').textContent = '₱ ' + totalPrice.toFixed(2);
        calculateTotalPrice();
      }
    });

    // Add click event listener to cancel buttons
    orderList.addEventListener('click', function(event) {
      if (event.target.classList.contains('cancel-button')) {
        const row = event.target.closest('tr');
        row.remove();
        calculateTotalPrice();
        createBeepSound().play();
      }
    });

    // Function to fetch products by category using AJAX

  function fetchProductsByCategory(categoryId) {
  console.log('Category ID:', categoryId); // Log the parameter sent

  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_products_by_category.php?category=' + categoryId, true);

  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      const productList = document.querySelector('#product-list');
      productList.innerHTML = response.html;

      // Reassign the click event listeners to the new product cards
      productCards = document.querySelectorAll('.product-card');
      productCards.forEach(function(card) {
        const beepSound = createBeepSound();

        card.addEventListener('click', function() {
          beepSound.play();
          const product = this.getAttribute('data-product');
          const price = parseFloat(this.getAttribute('data-price'));
          const proid = parseInt(this.getAttribute('data-proid'));
          const qty = parseInt(this.getAttribute('data-qty'));

          // Check if the product already exists in the order list
          const existingRow = isProductInOrderList(product);

          if (existingRow) {
            // If the product already exists, increment the quantity
            const quantityInput = existingRow.querySelector('.quantity-input');
            let quantity = parseInt(quantityInput.value);

            if (quantity < qty) {
              // Check if quantity hasn't reached the limit
              quantity += 1;
              if (quantity <= qty) {
                // Update the quantity only if it's within the limit
                quantityInput.value = quantity;
                const totalPrice = price * quantity;
                existingRow.querySelector('.total').textContent = '₱ ' + totalPrice.toFixed(2);
              }
            } else {
              alert('Quantity limit reached for this product!');
            }
          } else {
            // If the product doesn't exist, create a new row in the order list
            const newRow = document.createElement('tr');
            newRow.setAttribute('data-price', price.toFixed(2));
            const formattedPrice = price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            newRow.innerHTML = `
            <td class="product-name" style="font-size:.8rem;" width="20%"><input type="hidden" id="proid" name="proid" data-id="${proid}">${product}</td>
            <td width="10%">
              <input type="number" style="font-size:.8rem;" class="form-control quantity-input" value="1" min="1" max="${qty}" data-tbqty="${qty}">
            </td>
            <td width="16%" class="price" style="font-size:.8rem;">₱ ${formattedPrice}</td>
            <td width="16%" class="total" style="font-size:.8rem;">₱ ${formattedPrice}</td>
            <td width="20%">
              <button class="btn btn-danger btn-sm cancel-button" style="font-size:.8rem;">Remove <i class="bi bi-trash3"></i></button>
            </td>
            `;
            orderList.appendChild(newRow);
          }

          calculateTotalPrice();

          const quantityInputs = document.querySelectorAll('.quantity-input');
          quantityInputs.forEach(function(quantityInput) {
            quantityInput.addEventListener('change', function() {
              const inputQuantity = parseInt(quantityInput.value);
              if (inputQuantity > qty) {
                alert('Quantity limit reached for this product!');
                quantityInput.value = qty; // Reset to remaining quantity
              }
            });
          });
        });
      });
      categoryButtons.forEach(function(button) {
        button.classList.remove('active');
      });
      const clickedButton = document.querySelector(`#category-list button[data-category="${categoryId}"]`);
      clickedButton.classList.add('active');
      
    }
  };



  xhr.send();
}


    // Add click event listener to category buttons
    categoryButtons.forEach(function(button) {
      const beepSound = createBeepSound();
      button.addEventListener('click', function() {
        beepSound.play();
        const categoryId = this.getAttribute('data-category');
        fetchProductsByCategory(categoryId);
        if (!this.classList.contains('active')) {
          const categoryId = this.getAttribute('data-category');
          fetchProductsByCategory(categoryId);
        }
      });
    });

    // Call the calculateTotalPrice function initially to set the total to ₱0.00
    calculateTotalPrice();


});

</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
  const nameInput = document.getElementById('name');
  const customerList = document.getElementById('customer-list');
  let data; // Declare the 'data' variable in the appropriate scope

  // Function to fetch the filtered customer names from the server
  function fetchFilteredCustomers(searchTerm) {
    fetch('get_filtered_customers.php?search=' + searchTerm)
      .then(response => response.json())
      .then(responseData => {
        data = responseData; // Assign the received data to the 'data' variable
        console.log(data); // Log the received data to the console

        // Clear the previous customer list
        customerList.innerHTML = '';

        // Create a document fragment to append the options
        const fragment = document.createDocumentFragment();

        // Add each customer name as an option in the select menu
        data.forEach(customer => {
          const firstName = customer.FNAME;
          const lastName = customer.LNAME;
          const customerId = customer.CUSTOMERID;

          const option = document.createElement('option');
          option.value = firstName + ' ' + lastName + ' ' + customerId;
          option.textContent = firstName + ' ' + lastName;
          fragment.appendChild(option);
        });

        // Append the options to the select menu
        customerList.appendChild(fragment);

        // Show the customer list
        customerList.classList.remove('hidden');
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  // Event listener for the name input
  nameInput.addEventListener('input', function() {
    const searchTerm = nameInput.value.trim();

    if (searchTerm.length >= 2) {
      // Fetch and display the filtered customer names
      fetchFilteredCustomers(searchTerm);
    } else {
      // Clear the customer list
      customerList.innerHTML = '';
      // Hide the customer list
      customerList.classList.add('hidden');
    }
  });

  // Event listener for the customer list
  customerList.addEventListener('change', function() {
    if (data && data.length > 0) {
      const selectedIndex = customerList.selectedIndex;
      const selectedCustomer = data[selectedIndex];
      const customerId = selectedCustomer.CUSTOMERID;
      const customerIDInput = document.getElementById('customerID');
      customerIDInput.value = customerId; 

      // Update the name input value with the selected customer
      nameInput.value = selectedCustomer.FNAME + ' ' + selectedCustomer.LNAME;
      console.log(customerIDInput.value);
    }

    // Hide the customer list after selection
    customerList.classList.add('hidden');
  });
});

</script>



<script>
function printReceipt() {
  function formatNumberWithCommas(number) {
    return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  var receipt = "Payment Details\n\n";
  var customerName = document.getElementById('name').value;
  receipt += "Customer: " + customerName + "\n\n";
  var orderedProducts = document.querySelectorAll('#order-list tbody tr');
  var totalQuantity = 0;
  var totalPrice = 0;

  orderedProducts.forEach(function(row) {
    var productName = row.querySelector('.product-name').textContent;
    var quantity = parseInt(row.querySelector('.quantity-input').value);
    var price = parseFloat(row.getAttribute('data-price'));
    var proid = row.querySelector('.product-name #proid').value;
    var productTotal = price * quantity;
    totalPrice += quantity * price;

    receipt += proid + " " + productName + " x " + quantity + " = ₱ " + productTotal.toFixed(2) + "\n";
    totalQuantity += quantity;
  });

  receipt += "\n" + "Total Items: " + totalQuantity + "\n";

  var discount = document.getElementById('payment-discount').value;
  var vat = document.getElementById('payment-vat').value;
  var taxed = totalPrice * vat;
  var discounted = totalPrice * discount;
  var dis = discount * 100;
  var tax = vat * 100;

  receipt += "\n" + "Sub Total: " + formatNumberWithCommas(totalPrice) + "\n";
  receipt += "DIS. " + dis + "% : " + formatNumberWithCommas(discounted) + "\n";
  receipt += "VAT " + tax + "% : " + formatNumberWithCommas(taxed) + "\n";

  // Add background color to the total
  var total = document.querySelector('#total-price').textContent;
  var totalWithBackground = '<span style="background-color: yellow;">' + total + '</span>';
  receipt += "Total: " + totalWithBackground;

  // Update the receipt content in the modal
  document.getElementById('receiptContent').innerHTML = receipt;
  document.getElementById('modalTotalPrice').value = total;

  // Show the modal
  var receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
  receiptModal.show();
}

// Add event listener to the "Pay" button
document.getElementById('print-btn').addEventListener('click', printReceipt);




const printModalPrintBtn = document.querySelector('#print-modal-print-btn');
printModalPrintBtn.addEventListener('click', function() {
  // Get the values of paymentMethod and cleanedPaidAmount here
  var paymentMethod = $("#payment-method").val();
  var PaidAmount = $("#currency").val(); // Replace with your actual logic for getting the cleaned paid amount

  function clean(string) {
  string = string.replace(/ /g, '');
  string = string.replace(/\./g, '');
  string = string.replace(/[^A-Za-z0-9\-]/g, '');

  if (string.length > 2 && string.slice(-2) === '00') {
    string = string.slice(0, -2);
  }

  return string;
}
  cleanedPaidAmount = clean(PaidAmount)
  var idString = "print-modal-print-btn-" + paymentMethod + "-" + cleanedPaidAmount;

  // Split the string by "-"
  var idParts = idString.split("-");

  // Extract the payment method and cleaned paid amount
  var paymentMethod = idParts[4]; 
  var cleanedPaidAmount = idParts[5];

  console.log("Payment Method:", paymentMethod);
  console.log("Cleaned Paid Amount:", cleanedPaidAmount);

  function formatNumberWithCommas(number) {
    return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  // Get the necessary data for printing
  const customerName = document.getElementById('name').value;
  const customerID = document.getElementById('customerID').value;
  const orderNum = document.getElementById('orderNum').value;
  const orderRows = document.querySelectorAll('#order-list tbody tr');
  const products = [];
  let totalQuantity = 0; // Corrected declaration and initialization
  let totalPrice = 0;
  let subtotal = 0;

  orderRows.forEach(function(row) {
    const productName = row.querySelector('.product-name').textContent;
    const quantity = row.querySelector('.quantity-input').value;
    const rate = parseFloat(row.getAttribute('data-price'));
    var proid = row.querySelector('.product-name #proid').value;
    const total = row.querySelector('.total').textContent;
    totalPrice += quantity * rate;
    totalQuantity += parseInt(quantity); // Accumulate the quantity

    var discount = document.getElementById('payment-discount').value;
    var vat = document.getElementById('payment-vat').value;
    var taxed = totalPrice * vat;
    var discounted = totalPrice * discount;
    var dis = discount * 100;
    var tax = vat * 100;
    var gtotal = totalPrice + taxed - discounted;
    var gtotal2 = totalPrice + taxed - discounted;
    var change = cleanedPaidAmount - gtotal;

    const rates = "₱ " + formatNumberWithCommas(rate);
    const taxeds = "₱ " + formatNumberWithCommas(taxed);
    const discounteds = "₱ " + formatNumberWithCommas(discounted);
    const gtotals = "₱ " + formatNumberWithCommas(gtotal);
    const gtotal2s = "₱ " + formatNumberWithCommas(gtotal2);
    const changes = "₱ " + formatNumberWithCommas(change);
    const subTotals = "₱ " + formatNumberWithCommas(totalPrice);

    products.push({ 
      name: productName, 
      quantity: quantity, 
      proid: proid,
      rate: rates, 
      tqty: totalQuantity.toString(),
      total: total, 
      taxed: taxeds.toString(),
      discounted: discounteds.toString(),
      gtotal: gtotals.toString(),
      subTotal: subTotals.toString(),
      paymentMethod: paymentMethod,
      paidAmount: cleanedPaidAmount,
      change: changes,
      gtotal2: gtotal2s.toString()

     });
  });

  // Insert the data into the database using AJAX
  console.log(customerName);
  console.log(customerID);
  const data = {
    orderNum: orderNum,
    customerName: customerName,
    customerID:customerID,
    products: products
  };

  // Make an AJAX request to your PHP file that handles the database insertion
  const url = 'processOrder.php'; // Replace with the actual path to your PHP file
  const params = 'data=' + JSON.stringify(data);

  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Request successful, do something if needed
      console.log(xhr.responseText);
    }
  };
  xhr.send(params);

  // Pass the data to the print-modal.php file
  const printUrl = 'print-modal.php';
  const printParams = 'data=' + JSON.stringify(data);

  window.open(printUrl + '?' + printParams, '_blank');
});




document.addEventListener('DOMContentLoaded', function() {
  // Get the input element for the customer name
  const nameInput = document.getElementById('name');

  // Get the error message element
  const nameError = document.getElementById('nameError');

  // Get the pay button element
  const payButton = document.getElementById('print-btn');

  // Function to handle input event on the name input element
  function handleNameInput() {
    // Check if the input name is not set
    if (!nameInput.value) {
      nameError.textContent = 'Please enter a name.';
      payButton.disabled = true;
    } else {
      nameError.textContent = '';
      payButton.disabled = false;
    }
  }

  // Add input event listener to the name input element
  nameInput.addEventListener('input', handleNameInput);

  // Call the handleNameInput function initially to check the initial value
  handleNameInput();
});
</script>



</body>
</html>
