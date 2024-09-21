
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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


