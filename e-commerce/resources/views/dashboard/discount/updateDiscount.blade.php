
@extends('dashboardLayout.navAndsidebar')
@section('content')
<style>
#centerTable{
    width: 60%;
    margin-left: 20%
}
#btnLeft{
    display: flex;
   justify-content: end
}
</style>
<div class="container">

<form action="{{ route('updateDiscount' , $discountCoupon->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div id="centerTable" class="col-md-12">
            <div class="form-group">
              <label for="name">Code</label>
              <input
              name="code"
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter Discount Code"
                value="{{ $discountCoupon->code }}"
              />

            </div>
            <div class="form-group">
              <label for="email">discount amount</label>
              <input
    name="discount_amount"
    type="text"
    class="form-control"
    id="discount_amount"
    placeholder="Discount amount"
    value="{{ $discountCoupon->discount_amount }}"
    pattern="\d+(\.\d{1,2})?"
    step="0.01"
    title="Please enter a valid decimal amount (e.g., 10.00)"
/>
            </div>
            <div class="form-group">
              <label for="email">valid from</label>
              <input
              name="valid_from"
                type="date"
                class="form-control"
                min="{{\Carbon\Carbon::now()->toDateString()  }}"
                placeholder="discount amount"
                id="valid_from"
                onchange="updateValidUntilMin()"
                value="{{ $discountCoupon->valid_from }}"

                />
            </div>
            <div class="form-group">
              <label for="email">valid until</label>
              <input
              name="valid_until"
                type="date"
                class="form-control"
                onchange="updateValidUntilprev()"
                placeholder="discount amount"
                id="valid_until"
                value="{{ $discountCoupon->valid_until }}"

              />
            </div>
            <div class="form-group">
                <input

                    onchange="toggleCheckbox()"
                    type="checkbox"
                    class="form-check-input"
                    id="with_on_sale"
                    {{ $discountCoupon->with_on_sale ? "checked" : "" }}
                    value=""
                />
                <input type="hidden" name="with_on_sale" value="0" id="passedValue">
                <label style="margin-left: 7px" class="form-check-label" for="with_on_sale">
                    Do you want this discount to be used with products that have sales?
                </label>
            </div>
            <div class="form-group" id="btnLeft">
            <button

              class="btn btn-black btn-round ms-auto"
            >
              <i class="fas fa-money-bill"></i>
              update discount
            </button>
        </div>




    </div>
</form>
</div>
<script>
    const DiscountInput = document.getElementById('discount_amount');

DiscountInput.addEventListener('input', function() {
    // Use a regex to ensure input format of 0.xx
    this.value = this.value.replace(/^(0\.\d{0,2})|^0\.|[^0-9.]/g, '$1');

    // If the input is a valid number
    let value = parseFloat(this.value);
    if (!isNaN(value)) {
        // Check if the value is less than the minimum
        if (value < 0.01) {
            this.value = '0.01'; // Set to minimum value
        }
        // Check if the value is greater than the maximum
        else if (value > 0.99) {
            this.value = '0.99'; // Set to maximum value
        } else {
            // Ensure value is displayed with two decimal places
            this.value = value.toFixed(2);
        }
    }
});
     function toggleCheckbox() {
    let checkbox = document.getElementById('with_on_sale');
    let passedValue = document.getElementById('passedValue');

    // If the checkbox is checked, set hidden input value to 1, otherwise 0
    if (checkbox.checked) {
        passedValue.value = 1;
    } else {
        passedValue.value = 0;
    }

    // Optional: Log the value for debugging
    console.log(passedValue.value);
}
     function updateValidUntilMin() {
        // Get the value of the valid_from date
        let validFromDate = document.getElementById('valid_from').value;
        let validUntilDate = document.getElementById('valid_until').value;


        if (validFromDate) {
            document.getElementById('valid_until').min = validFromDate;
        }
        // here to set the min value for the next input to be based on the validFromDate
        if(validFromDate > validUntilDate){

            document.getElementById('valid_until').min = validFromDate;
            document.getElementById('valid_until').value = validFromDate;

        }
    }


</script>
@endsection


