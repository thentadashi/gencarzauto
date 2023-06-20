<!-- Modal -->
<div id="receiptModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-7">
            <pre id="receiptContent"></pre>
          </div>
          <div class="col-lg-5">
            <div class="form-group dropup">
              <label for="payment-method">Payment Method</label>
              <select class="form-select" id="payment-method">
                <option value="Cash">Cash</option>
              </select>
            </div>
            <div class="form-group">
              <label for="modalTotalPrice">Payable Amount</label>
              <input type="text" class="form-control" id="modalTotalPrice" name="modalTotalPrice" disabled/>
            </div>
            <div class="form-group">
              <label for="payment">Pay</label>
              <input type="text" class="form-control" id="currency" name="payment" data-type="currency"/>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" id="print-modal-print-btn" disabled><i class="bi bi-check"></i> Pay</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$("input[id='currency'").on({
    keyup: function(){
        formatCurrency($(this))
    },
    blur: function(){
        formatCurrency($(this), "blur")
    }
})

function formatNumber(n){
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) {

    var input_val = input.val();

    if(input_val === "") {return ;}

    var original_len = input_val.length;

    var caret_pos = input.prop("selectionStart");

    if(input_val.indexOf(".") >= 0){

        var decimal_pos = input_val.indexOf(".");

        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        left_side = formatNumber(left_side);

        right_side = formatNumber(right_side);

        if (blur === "blur"){
            right_side += "00";
        }

        right_side = right_side.substring(0, 2);

        input_val = "₱" + left_side + "." + right_side;
    }else{

        input_val = formatNumber(input_val);
        input_val = "₱" + input_val;

        if(blur === "blur"){
            input_val += ".00"
        }
    }

    input.val(input_val);

    var update_len = input_val.length;
    caret_pos = update_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
  }

  function clean(string) {
    string = string.replace(/ /g, '');
    string = string.replace(/\./g, '');
    return string.replace(/[^A-Za-z0-9\-]/g, '');
  }
  $("#print-modal-print-btn").click(function() {
        var paymentMethod = $("#payment-method").val();
        var paidAmount = $("#currency").val();

        var cleanedPaidAmount = clean(paidAmount);

        var newIdValue = "print-modal-print-btn-" + paymentMethod + "-" + cleanedPaidAmount;
        $("#newIdValue").text(newIdValue);

        var modalTotalPrice = parseFloat($("#modalTotalPrice").val().replace(/[^\d.]/g, ""));
        var payment = parseFloat(cleanedPaidAmount);

      });

      $(document).ready(function() {
  $("#currency").on("keyup", function() {
    updateButtonStatus();
  });

  function updateButtonStatus() {
    var payment = parseFloat($("#currency").val().replace(/[^\d.]/g, ""));
    var modalTotalPrice = parseFloat($("#modalTotalPrice").val().replace(/[^\d.]/g, ""));

    if (payment < modalTotalPrice) {
      $("#print-modal-print-btn").prop("disabled", true);
    } else {
      $("#print-modal-print-btn").prop("disabled", false);
    }
  }
});


</script>



