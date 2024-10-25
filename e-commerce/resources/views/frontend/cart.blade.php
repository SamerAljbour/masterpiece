@extends('layout.mainTwo')
@section('content')
<style>
.styled-button {
    padding: 9px 20px 7px;
    border: 1px solid #eaeaea;
    font-weight: 700;
    text-transform: uppercase;
    cursor: pointer;
    -webkit-transition: all 0.2s ease-out 0s;
    transition: all 0.2s ease-out 0s;
    color: #000; /* Default text color */
    background-color: transparent; /* Default transparent background */
    text-decoration: none; /* Remove underline */
}
.fa-remove:before, .fa-close:before, .fa-times:before{
    content: "" !important;
}
.styled-button:hover {
    background-color: #e34444; /* Red background on hover */
    color: #fff; /* White text color on hover */
    border-color: #e34444; /* Red border on hover */
}
    .cart-header {
      border-bottom: 1px solid #eee;
      padding-bottom: 15px;
      margin-bottom: 30px;
    }
    .cart-header h2 {
      font-size: 24px;
      font-weight: 600;
      margin: 0;
    }
    .cart-table {
      width: 100%;
      margin-bottom: 30px;
      border-collapse: separate;
      border-spacing: 0 15px;
    }
    .cart-table th {
      background-color: #f9f9f9;
      padding: 12px;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 13px;
      color: #666;
    }
    .cart-table td {
      padding: 15px 12px;
      vertical-align: middle;
      background-color: #fff;
      border-top: 1px solid #eee;
      border-bottom: 1px solid #eee;
    }
    .cart-table tr:hover td {
      background-color: #f9f9f9;
    }
    .product-image {
      max-width: 80px;
      height: auto;
      margin-right: 15px;
    }
    .product-name {
      font-weight: 500;
    }
    .quantity-input {
      width: 50px;
      text-align: center;
      border: 1px solid #ddd;
      padding: 5px;
      border-radius: 3px;
    }
    .btn-quantity,
    .btn-update {
      background-color: #f0f0f0;
      border: 1px solid #ddd;
      padding: 5px 10px;
      font-size: 12px;
      margin: 0 2px;
    }
    .btn-remove {
      color: #999;
      background: none;
      border: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }
    .btn-remove:hover {
      color: #d9534f;
    }
    .estimate-shipping,
    .discount-codes {
      background-color: #f9f9f9;
      padding: 20px;
      margin-top: 30px;
      border-radius: 4px;
    }
    .estimate-shipping h4,
    .discount-codes h4 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 18px;
      font-weight: 600;
    }
    .cart-total {
      background-color: #f9f9f9;
      padding: 20px;
      margin-top: 30px;
      border-radius: 4px;
    }
    .cart-total h3 {
      font-size: 22px;
      font-weight: 600;
      margin-top: 10px;
    }
    .btn-default {
      background-color: #f0f0f0;
      border-color: #ddd;
      transition: all 0.3s ease;
    }
    .btn-default:hover {
      background-color: #e0e0e0;
    }
    .btn-proceed {
      background-color: #5cb85c;
      color: white;
      padding: 12px 20px;
      border: none;
      font-size: 16px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    .btn-proceed:hover {
      background-color: #4cae4c;
    }
    @media (max-width: 767px) {
      .container {
        padding: 15px;
      }
      .cart-table,
      .cart-table thead,
      .cart-table tbody,
      .cart-table th,
      .cart-table td,
      .cart-table tr {
        display: block;
      }
      .cart-table thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }
      .cart-table tr {
        border: 1px solid #ccc;
        margin-bottom: 15px;
      }
      .cart-table td {
        border: none;
        position: relative;
        padding-left: 50%;
        text-align: left;
      }
      .cart-table td:before {
        position: absolute;
        top: 15px;
        left: 12px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        content: attr(data-title);
        font-weight: bold;
      }
      .product-image {
        max-width: 100%;
        margin-bottom: 10px;
      }
      .quantity-input {
        width: 60px;
      }
      .btn-quantity,
      .btn-update,
      .btn-remove {
        margin-top: 5px;
      }
    }


    .checkout-btn {
    background-color: transparent;
    border: 0;
    cursor: not-allowed; /* Changes the cursor to indicate it's disabled */
    opacity: 0.6; /* Makes it look visually disabled */
    color: #d10024; /* Keeps your preferred red color */
    font-size: 16px;
    padding: 10px 20px;
}

.checkout-btn:disabled {
    pointer-events: none; /* Ensures the button can't be clicked */
    opacity: 0.5; /* Makes the button look more disabled */
}

.checkout-btn span.style-bd {
    font-weight: bold;
}
</style>
            <!-- BREADCRUMBS -->
            <div id="sns_breadcrumbs" class="wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="sns_titlepage"></div>
                            <div id="sns_pathway" class="clearfix">
                                <div class="pathway-inner">
                                    <span class="icon-pointer "></span>
                                    <ul class="breadcrumbs">
                                        <li class="home">
                                            <a title="Go to Home Page" href="{{ route('home') }}">
                                                <i class="fa fa-home"></i>
                                                <span>Home</span>
                                            </a>
                                        </li>
                                        <li class="category3 last">
                                            <span>Shopping cart</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND BREADCRUMBS -->

            <!-- CONTENT -->
            <div id="sns_content" class="wrap layout-m">
                <div class="container">
                    <div class="row">
                        <div class="shoppingcart">
                            <div class="sptitle col-md-12">
                                <h3>SHOPPING CART</h3>

                            </div>
                            @if (count($cartData))
    <table class="cart-table">
        <thead>
            <tr>
                <th>PRODUCT NAME</th>
                <th>UNIT PRICE</th>
                <th>QTY</th>
                <th>SUBTOTAL</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartData as $product)
                <tr>
                    <td data-title="PRODUCT NAME">
                        <img src="{{ Storage::url($product->image_url) }}" alt="Product" class="product-image" width="80" height="80">
                        <span class="product-name">{{ $product->name }}</span>
                    </td>
                    <td data-title="UNIT PRICE">
                        @if ($product->on_sale)
                            JD {{ number_format($product->price - ($product->price * $product->on_sale), 2) }}
                        @else
                            JD {{ number_format($product->price, 2) }}
                        @endif
                    </td>
                    <td data-title="QTY">
                        <form action="{{ route('updatecart', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="button" id="sub" class="btn btn-quantity" onclick="changeQuantity(-1, this)">-</button>
                            <input type="number" name="quantity" class="inputQua" value="{{ $product->pivot->quantity }}" min="1" id="quantityInput">
                            <button type="button" id="add" class="btn btn-quantity" onclick="changeQuantity(1, this)">+</button>

                            <button type="submit" class="styled-button"><span class="style-bd">update</span></button>
                        </form>

                    </td>
                    <td data-title="SUBTOTAL">
                        JD {{ number_format($product->pivot->quantity * ($product->price - ($product->price * $product->on_sale)), 2) }}
                    </td>
                    <td>
                        <form action="{{ route('deleteFromCart', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-remove"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('home') }}" class="styled-button">CONTINUE SHOPPING</a>

        </div>
        <div class="col-md-8 text-right">
            <form action="{{ route('clearCart') }}" method="POST" style="display: inline;">
                @csrf
                @method("DELETE")
                <button type="submit" class="styled-button">CLEAR SHOPPING CART</button>
            </form>
        </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 50px;">
                <img src="{{ asset('images/empty-cart.png') }}" alt="Empty Cart" class="img-responsive center-block" style="width: 150px; height: auto; margin-bottom: 20px;">
                <p class="text-danger" style="font-size: 18px;">No items in the cart.</p>
            </div>
        </div>
    </div>
@endif
                            <div class="content col-md-12">







                                <div class="row">
                                    {{-- <form class="col-md-4">
                                        <div class="form-bd">
                                            <h3>ESTIMATE SHIPPING AND TAX</h3>
                                            <p class="text1">Enter your destination to get a shipping estimate.</p>
                                            <p class="country">
                                                <span class="color1">*</span>Country
                                            </p>
                                            <select id="country" class="validate-select" title="Country" name="country_id">
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                            </select>

                                            <p>State/Province</p>

                                            <select id="region_id" class="required-entry validate-select" title="State/Province" name="region_id">
                                                <option value="">Please select region, state or province</option>
                                                <option value="1">Alabama</option>
                                                <option value="2">Alaska</option>
                                                <option value="3">American Samoa</option>
                                                <option value="4">Arizona</option>
                                                <option value="5">Arkansas</option>
                                                <option value="6">Armed Forces Africa</option>
                                                <option value="7">Armed Forces Americas</option>
                                                <option value="8">Armed Forces Canada</option>
                                                <option value="9">Armed Forces Europe</option>
                                                <option value="10">Armed Forces Middle East</option>
                                            </select>
                                            <p class="zip">Zip/Postal Code</p>
                                            <input class="style23" type="text" value="" size="30" />
                                            <span class="style-bd">Get a quote</span>
                                        </div>
                                    </form> --}}
                                    <form class="col-md-6" method="POST" action="{{ route('addDiscount') }}">
                                        @method("POST")
                                        @csrf
                                        <div class="form-bd">

                                                <h3>DISCOUNT CODES</h3>
                                            <p class="formbd2">Enter your coupon code if you have one.</p>
                                            <input class="styleip" type="text" name="discountCopon"  value="" size="30" />
                                            <input class="styleip" type="hidden" name="on_sale" id="isOnSale"  value="0" size="30" />
                                            <button type="submit" class="style-bd">Apply coupon</button>
                                        </div>
                                    </form>
                                    <form class="form-right col-md-6">
                                        <div class="form-bd">
                                            <p class="subtotal">
                                                <span class="text1">SUBTOTAL:</span>
                                                <span class="text2">JD {{ number_format($totalCartPrice->total_amount, 2) }}</span>
                                            </p>
                                            <h3>
                                                <span class="text3">GRAND TOTAL:</span>
                                                @if (session('afterDiscount'))
                                                <span class="text4">JD {{   number_format(session('afterDiscount'), 2)  }}</span>

                                                @else
                                                <span class="text4">JD {{   number_format($totalCartPrice->total_amount, 2)  }}</span>

                                                @endif
                                            </h3>
                                            @if (count($cartData) )
                                            <a href="{{ route('viewPayment') }}"><span class="style-bd">Proceed to checkout</span></a>
                                            @else
                                            <button disabled class="checkout-btn">
                                                <span class="style-bd">Proceed to checkout</span>
                                            </button>
                                            @endif
                                            <p class="checkout">Checkout with Multiple Addresses</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND CONTENT -->


            <script>

function changeQuantity(amount, element) {
    // Find the closest form and then find the input within that form
    const quantityInput = element.closest('form').querySelector('.inputQua');
    let currentQuantity = parseInt(quantityInput.value, 10); // Parse as integer with base 10

    // Check if currentQuantity is NaN (not a number), if so, set it to 0
    if (isNaN(currentQuantity)) {
        currentQuantity = 0;
    }

    // Update the quantity
    currentQuantity += amount;

    // Ensure the quantity is not less than the minimum value (1)
    if (currentQuantity < 1) {
        currentQuantity = 1;
    }

    // Set the updated quantity back to the input
    quantityInput.value = currentQuantity;
}



            </script>
            @endsection
