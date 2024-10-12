
    @extends('dashboardLayout.navAndsidebar')
    @section('content')
    <style>
    #centerTable{
        width: 60%;
        margin-left: 20%
    }
    #btnLeft{
        margin-left: 74%;
    }
    </style>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('storeDiscount') }}" method="POST">
        @csrf
        <div id="centerTable" class="col-md-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    name="code"
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter Discount Code"
                />
            </div>
            <div class="form-group">
                <label for="discount_amount">Discount Amount</label>
                <input
                    name="discount_amount"
                    type="text"
                    class="form-control"
                    id="discount_amount"
                    placeholder="Discount amount"
                    pattern="\d+(\.\d{1,2})?"
                    title="Please enter a valid decimal amount (e.g., 10.00)"
                />
            </div>
            <div class="form-group">
                <label for="valid_from">Valid From</label>
                <input
                    name="valid_from"
                    type="date"
                    class="form-control"
                    min="{{ \Carbon\Carbon::now()->toDateString() }}"
                    id="valid_from"
                    onchange="updateValidUntilMin()"
                />
            </div>
            <div class="form-group">
                <label for="valid_until">Valid Until</label>
                <input
                    name="valid_until"
                    type="date"
                    class="form-control"
                    id="valid_until"
                    onchange="updateValidUntilprev()"
                />
            </div>
            <div class="form-group">
                <input
                    onchange="toggleCheckbox()"
                    type="checkbox"
                    class="form-check-input"
                    id="with_on_sale"
                    value=""
                />
                <input type="hidden" name="with_on_sale" value="0" id="passedValue">
                <label style="margin-left: 7px" class="form-check-label" for="with_on_sale">
                    Do you want this discount to be used with products that have sales?
                </label>
            </div>
            <div class="form-group" id="btnLeft">
                <button class="btn btn-black btn-round ms-auto">
                    <i class="fa far fa-user"></i>
                    Create Discount
                </button>
            </div>
        </div>
    </form>

    </div>
    <script>
        function toggleCheckbox() {
    let checkbox = document.getElementById('with_on_sale');
    let passedValue = document.getElementById('passedValue');

    // If the checkbox is checked, set hidden input value to 1, otherwise 0
    if (checkbox.checked) {
        passedValue.value = 1;
    } else {
        passedValue.value = 0;
    }


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


