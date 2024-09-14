@extends('layout.mainTwo')
@section('content')
    <!-- AND HEADER -->
<style>

</style>

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessages,
            });
        });
    </script>
@endif

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
                                    <span>Modular Modern</span>
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
                <div id="sns_main" class="col-md-12 col-main">
                    <div id="sns_mainmidle">
                        <div class="product-view sns-product-detail">
                            <div class="product-essential clearfix">
                                <div class="row row-img">

                                    <div class="product-img-box col-md-4 col-sm-5">
                                        <div class="detail-img">
                                            <img src="{{ Storage::url($product->image_url) }}" alt="">
                                        </div>
                                        <div class="small-img">
                                            <div id="sns_thumbail" class="owl-carousel owl-theme">
                                                @foreach ($product->photos as $photos)
                                                    <div class="item">
                                                        <img src="{{ Storage::url($photos->photo_url) }}" alt="">
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div id="product_shop" class="product-shop col-md-8 col-sm-7">
                                        <div class="item-inner product_list_style">
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a title="Modular Modern"
                                                        href="index3-detail.html">{{ $product->name }}</a>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <span class="regular-price">
                                                            <span class="price">{{ $product->price }} JOD</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="availability">
                                                        @if ( $product->stock_quantity > 0 )
                                                        <p class="style1 " ><span class="instock">in stock : </span>  <span class="numberofstock">{{ $product->stock_quantity }}</span></p>
                                                        @else
                                                        <p class="style1 outofstock">out of stock </p>

                                                        @endif
                                                </div>
                                                <div class="rating-block">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            @if ($reviews->count() > 0)
                                                            <div class="rating" style="width:{{ ($reviews->sum('rating') / $reviews->count()) * 20 }}%;"></div>
                                                            @else
                                                            <div class="rating" style="width:0%;"></div>

                                                            @endif
                                                        </div>
                                                        <span class="amount">
                                                            <a href="#">({{ $reviews->count() }} Reviews)</a>
                                                            <span class="separator">|</span>
                                                            <a href="http://127.0.0.1:8000/productdetail/4#review">Add Your Review</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="desc std">
                                                    <h5>QUICK OVERVIEW</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel
                                                        magna quis risus commodo porttitor. Praesent rutrum lectus diam, ac
                                                        consequat dolor hendrerit sit amet. Nulla tincidunt tempor nulla et
                                                        fermentum. Maecenas tempor massa sed sodales dignissim</p>
                                                </div>

                                                <form>
                                                    <p class="mg-size">SIZE
                                                        <span>*</span>
                                                    </p>
                                                    <select>
                                                        <option>S</option>
                                                        <option>M</option>
                                                        <option>L</option>
                                                        <option>XL</option>
                                                    </select>

                                                    <p class="mg-color">COLOR
                                                        <span>*</span>
                                                    </p>
                                                    <select class="style-color">
                                                        <option class="red">Red</option>
                                                        <option class="yellow">Yellow</option>
                                                        <option class="blue">Blue</option>
                                                        <option class="green">Green</option>
                                                    </select>
                                                </form>


                                                <div class="actions">
                                                    <form action="{{ route('storeToCartQua') }}" method="POST">
                                                        @csrf
                                                        <label class="gfont" for="qty">Qty : </label>
                                                        <div class="qty-container">
                                                            <button class="qty-decrease" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) && qty > 1 ) qty_el.value--;return false;" type="button"></button>
                                                            <input id="qty"name="quantity" class="input-text qty" type="text" title="Qty" value="1" name="qty">
                                                            <button class="qty-increase" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;" type="button">+</button>
                                                        </div>                                                        <input type="hidden" value="{{ Auth::user()->id }}"  name="cart_id">
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                                        <button class="btn-cart" title="Add to Cart"  type="submit">
                                                            Add to Cart
                                                        </button>
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" data-original-title="Add to Wishlist"
                                                                    data-toggle="tooltip" href="#" title=""></a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" data-original-title="Add to Compare"
                                                                    data-toggle="tooltip" href="#" title=""></a>
                                                            </li>
                                                            <li>
                                                                <div class="wrap-quickview" data-id="qv_item_8">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            data-original-title="View" data-toggle="tooltip"
                                                                            href="#">
                                                                            <span>View</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </form>




                                                </div>
                                                <div class="addthis_native_toolbox"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom row">
                <div class="2coloum-left">
                    <div id="sns_left" class="col-md-3">
                        <div class="bestsale">
                            <div class="title">
                                <h3>BEST SALE</h3>
                            </div>
                            <div class="content">
                                <div id="products_slider12" class="products-slider12 owl-carousel owl-theme"
                                    style="display: inline-block">
                                    <div class="item-row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/10.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/11.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/12.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/13.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/14.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/15.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/16.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/17.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/18.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/19.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/20.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/21.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block block-banner banner5">
                            <a href="#">
                                <img src="images/blog-banner1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div id="sns_mainm" class="col-md-9">
                        <div id="sns_description" class="description">
                            <div class="sns_producttaps_wraps1">
                                <h3 class="detail-none">Description
                                    <i class="fa fa-align-justify"></i>
                                </h3>
                                <!-- Nav tabs -->
                                   <!-- Nav tabs -->
                                   <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active style-detail"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Description</a></li>
                                    {{-- <li role="presentation" class="style-detail"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li> --}}
                                    <li role="presentation" class="style-detail"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Product Tags</a></li>
                                </ul>




                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="style1">
                                            <p class="top">
                                                {{ $product->description }}
                                            </p>
                                            <p class="mid">
                                                {{ $product->description }}
                                            </p>
                                            <p class="bot">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        <div class="collateral-box">
                                            <p>
                                                <img alt="" src="http://placehold.it/240x180"
                                                    style="margin-top: 5px;">
                                            </p>
                                            <p>Retra faucibus eu laoreet nunc. Tincidunt nulla a Nulla eu convallis
                                                scelerisque sociis nulla interdum et. Cursus senectus aliquet pretium at
                                                tristique hac ullamcorper adipiscing et Donec. Enim montes parturient.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="products-upsell">
                            <div class="detai-products1">
                                <div class="title">
                                    <h3>Upsell products</h3>
                                </div>
                                <div class="products-grid">
                                    <div id="related_upsell" class="item-row owl-carousel owl-theme"
                                        style="display: inline-block">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/16.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-new">New</span>
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/17.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/18.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-new">New</span>
                                                        </div>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/19.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/11.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="products-related">
                            <div class="detai-products1">
                                <div class="title">
                                    <h3>Related products</h3>
                                </div>
                                <div class="products-grid">
                                    <form class="top">
                                        <input type="checkbox" name="vehicle" value="Bike">Check all products
                                    </form>
                                    <div id="related_upsell1" class="item-row owl-carousel owl-theme"
                                        style="display: inline-block">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <form class="bot">
                                                            <input type="checkbox" name="vehicle" value="Bike">
                                                        </form>
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/8.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <form class="bot">
                                                            <input type="checkbox" name="vehicle" value="Bike">
                                                        </form>
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-new">New</span>
                                                        </div>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/13.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <form class="bot">
                                                            <input type="checkbox" name="vehicle" value="Bike">
                                                        </form>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/3.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <form class="bot">
                                                            <input type="checkbox" name="vehicle" value="Bike">
                                                        </form>
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-new">New</span>
                                                        </div>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/26.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <form class="bot">
                                                            <input type="checkbox" name="vehicle" value="Bike">
                                                        </form>
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/29.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">$ 540.00</span>
                                                                            <span class="price2">$ 600.00</span>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-bot">
                                                        <div class="wrap-addtocart">
                                                            <button class="btn-cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        </div>
                                                        <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <section id="review">
            <div class="collateral-box">
                <div class="form-add">
                    <h2>Write Your Own Review</h2>
                    <form id="review-form" action="{{ route('submitreview') }}" method="POST">
                        @csrf
                        <fieldset>
                            <h3>
                                You're reviewing:
                                <span><b>{{ $product->name }}</b></span>
                            </h3>
                            <ul class="form-list">
                                <li>
                                    <label class="required" for="review_field">
                                        <em>*</em> Review
                                    </label>
                                    <div class="input-box">
                                        <textarea id="review_field" name="comment" class="form-control" rows="3" placeholder="Write your review here..."></textarea>
                                    </div>
                                </li>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <li>
                                    <label class="required" for="rating_field">
                                        <em>*</em> Your Rating
                                    </label>
                                    <div class="stars" id="rating-stars">
                                        <i class="fa fa-star" data-value="1"></i>
                                        <i class="fa fa-star" data-value="2"></i>
                                        <i class="fa fa-star" data-value="3"></i>
                                        <i class="fa fa-star" data-value="4"></i>
                                        <i class="fa fa-star" data-value="5"></i>
                                    </div>
                                    <input type="hidden" id="rating-value" name="rating" value="1">
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button class="btn-custom btn-sm" type="submit" title="Submit Review">
                                    Submit Review
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
           </section>



            <div class="col-md-12  ">
                <div class="page-header">
                    @if ( $reviews->count()  == 0)
                    <h1 class="commentTitle"><small class="pull-right ">0 comments</small> Comments </h1>
                    @elseif ( $reviews->count()  == 1)
                    <h1 class="commentTitle"><small class="pull-right clearfix">1 comment</small> Comments </h1>
                    @else
                    <h1 class="commentTitle"><small class="pull-right clearfix">{{ $reviews->count() }} comments</small> Comments </h1>
                    @endif
                </div>
                 <div class="comments-list">
                    {{-- in productlist cont --}}
                    @foreach ($reviews as $review)

                    <div class="media">
                        <p class="pull-right clearfix"><small>{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y')}} </small> </p>
                        <div class="photoAndName">

                            <a class="media-left" href="#">
                                <img width="50px"class="profilePhoto" src="{{ Storage::url($review->user->user_image) }}">
                            </a>
                            <h4 class="media-heading user_name">{{ $review->user->name }}</h4>
                        </div>
                        <div class="media-body">
                            <div  class="col-md-12 ">
                                <p >{{$review->comment}}</p>

                            </div>
                            <br>
                            <div class="rating-box" >
                                <div class="rating" style="width: {{ $review->rating * 20 }}%; "></div>
                            </div>
                            <div class="pull-right"  id="iconReview">

                                <p >
                                    <form action="{{ route('deletereview' , $review->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                        <button type="submit"  style="background: none; border: none; cursor: pointer;" title="Delete">
                                            <i class="fa fa-trash" id="iconsize" style="color:red; margin-bottom:4px"></i>
                                        </button>

                                    </form>
                                    <a href="" ><i class="fa fa-edit" id="iconsize"  style="color:blue"></i></a>
                            </p>
                            </div>


                         </div>

                       </div>
                    @endforeach


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
                    <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded"
                        style="display: inline-block">
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
    <!-- AND PARTNERS -->

@endsection
