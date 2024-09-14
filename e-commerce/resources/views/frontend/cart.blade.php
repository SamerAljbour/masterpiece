@extends('layout.mainTwo')
@section('content')


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
                                            <a title="Go to Home Page" href="#">
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
                                <h4 class="style">PROCEED TO CHECKOUT</h4>
                            </div>
                            <div class="content col-md-12">
                                <ul class="title clearfix">
                                    <li class="text1"><a href="#">PRODUCT NAME</a></li>
                                    <li class="text2"><a href="#">UNIT PRICE</a></li>
                                    <li class="text2"><a href="#">QTY</a></li>
                                    <li class="text2"><a href="#">SUB TOTAL</a></li>
                                </ul>




                                @if (count($cartData) )
                                @foreach ($cartData as $product)

                                <ul class="nav-mid clearfix" >
                                    <li class="image"><a href="#"><img src="{{ Storage::url($product->image_url) }}" width="122px" alt=""></a></li>
                                    <li class="item-title" ><a href="#">{{ $product->name }}</a></li>
                                    <li class="icon1"> <form action="{{ route('updatecart' , $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="quantity" class="hiddenQuanitiy"  value="{{ $product->pivot->quantity }}">
                                        <button type="submit"><i class="btn-save fa fa-save"></i></button>
                                    </form></li>
                                    <li class="price1">JD {{ $product->price }}</li>
                                    <li class="number">
                                        <button onclick="subQua(event)" id="sub" class="btn btn-default btnQua"> -</button>
                                        <input type="number" value="{{ $product->pivot->quantity }}" class="inputQua">
                                        <button id="add" onclick="addQua(event)" class="btn btn-default btnQua"> + </button>
                                    </li>
                                    <li class="price2">JD {{ $product->pivot->quantity *  $product->price  }}</li>
                                    <li class="icon2" >


                                        <form action="{{ route('deleteFromCart' , $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="quantity" class="hiddenQuanitiy"  value="{{ $product->pivot->quantity }}">
                                            <button type="submit"><i class="btn-remove fa fa-remove"></i></button>
                                        </form>
                                    </li>
                                </ul>
                                @endforeach
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
                                <ul class="nav-bot clearfix">
                                    <li class="continue"><a href="{{ route('home') }}">Continue shopping</a></li>
                                    <li class="clear">
                                        <form action="{{ route('clearCart') }}" method="POST">
                                            @csrf
                                            @method("DELETE")

                                            <button type="submit">clear shopping cart</button></li>

                                        </form>
                                    <li class="update">
                                        <form action="" method="POST">
                                            @method("PUT")
                                            <input type="hidden" name="">
                                            <input type="hidden" name="">
                                            <input type="hidden" name="">
                                            {{-- <button class="btn btn-cart" type="submit">update shopping cart</button> --}}
                                        </form>
                                    </li>
                                </ul>
                                <div class="row">
                                    <form class="col-md-4">
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
                                    </form>
                                    <form class="col-md-4" method="POST" action="{{ route('addDiscount') }}">
                                        @method("POST")
                                        @csrf
                                        <div class="form-bd">
                                            <h3>DISCOUNT CODES</h3>
                                            <p class="formbd2">Enter your coupon code if you have one.</p>
                                            <input class="styleip" type="text" name="discountCopon"  value="" size="30" />
                                            <button type="submit" class="style-bd">Apply coupon</button>
                                        </div>
                                    </form>
                                    <form class="form-right col-md-4">
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
                                            <span class="style-bd">Proceed to checkout</span>
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

            <!-- PARTNERS -->
            <div id="sns_partners" class="wrap">
                <div class="container">
                    <div class="slider-wrap">
                        <div class="partners_slider_in">
                            <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded" style="display: inline-block">
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/1.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/2.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/3.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/4.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/5.png">
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="banner11" href="#" target="_blank">
                                        <img alt="" src="images/brands/6.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection
