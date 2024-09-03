
@extends('layout.mainTwo')
@section('content')



            <!-- AND HEADER -->

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
                                                    <img src="images/products/13.jpg" alt="">
                                                </div>
                                                <div class="small-img">
                                                    <div id="sns_thumbail" class="owl-carousel owl-theme">
                                                        <div class="item">
                                                            <img src="images/products/1.jpg" alt="">
                                                        </div>
                                                        <div class="item">
                                                            <img src="images/products/2.jpg" alt="">
                                                        </div>
                                                        <div class="item">
                                                            <img src="images/products/3.jpg" alt="">
                                                        </div>
                                                        <div class="item">
                                                            <img src="images/products/4.jpg" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="product_shop" class="product-shop col-md-8 col-sm-7">
                                                <div class="item-inner product_list_style">
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a title="Modular Modern" href="index3-detail.html">Modular Modern</a>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="availability">
                                                            <p class="style1">Availability: In stock</p>
                                                        </div>
                                                        <div class="rating-block">
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <div class="rating" style="width:60%"></div>
                                                                </div>
                                                               <span class="amount">
                                                                    <a href="#">(1 Reviews)</a>
                                                                    <span class="separator">|</span>
                                                                    <a href="#">Add Your Review</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="desc std">
                                                            <h5>QUICK OVERVIEW</h5>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel magna quis risus commodo porttitor. Praesent rutrum lectus diam, ac consequat dolor hendrerit sit amet. Nulla tincidunt tempor nulla et fermentum. Maecenas tempor massa sed sodales dignissim</p>
                                                        </div>

                                                        <form>
                                                            <p class="mg-size">SIZE
                                                                <span>*</span>
                                                            </p>
                                                            <select >
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
                                                            <label class="gfont" for="qty">Qty : </label>
                                                            <div class="qty-container">
                                                                <button class="qty-decrease" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) && qty > 1 ) qty_el.value--;return false;" type="button"></button>
                                                                <input id="qty" class="input-text qty" type="text" title="Qty" value="1" name="qty">
                                                                <button class="qty-increase" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;" type="button"></button>
                                                            </div>

                                                            <button class="btn-cart" title="Add to Cart" data-id="qv_item_8">
                                                                Add to Cart
                                                            </button>
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" data-original-title="Add to Wishlist" data-toggle="tooltip" href="#" title=""></a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" data-original-title="Add to Compare" data-toggle="tooltip" href="#" title=""></a>
                                                                </li>
                                                                <li>
                                                                    <div class="wrap-quickview" data-id="qv_item_8">
                                                                        <div class="quickview-wrap">
                                                                            <a class="sns-btn-quickview qv_btn" data-original-title="View" data-toggle="tooltip" href="#">
                                                                                <span>View</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
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
                                        <div id="products_slider12" class="products-slider12 owl-carousel owl-theme" style="display: inline-block">
                                            <div class="item-row">
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <div class="prd">
                                                            <div class="item-img clearfix">
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/10.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/11.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/12.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/13.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/14.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/15.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/16.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/17.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/18.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/19.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/20.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/21.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active style-detail"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Description</a></li>
                                            <li role="presentation" class="style-detail"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                            <li role="presentation" class="style-detail"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Product Tags</a></li>
                                        </ul>




                                          <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="home">
                                                <div class="style1">
                                                    <p class="top">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </p>
                                                    <p class="mid">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                                    </p>
                                                    <p class="bot">
                                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                                                    </p>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="profile">
                                                <div class="collateral-box">
                                                    <div class="form-add">
                                                        <h2>Write Your Own Review</h2>
                                                        <form id="review-form">
                                                            <input type="hidden" value="8haZqMXtybxMqfBa" name="form_key">
                                                            <fieldset>
                                                                <h3>
                                                                    You're reviewing:
                                                                    <span>Cfg Armani Blue</span>
                                                                </h3>
                                                                <ul class="form-list">
                                                                    <li>
                                                                        <label class="required" for="nickname_field">
                                                                            <em>*</em>
                                                                            Nickname
                                                                        </label>
                                                                        <div class="input-box">
                                                                            <input id="nickname_field" class="input-text required-entry" type="text" value="" name="nickname">
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <label class="required" for="summary_field">
                                                                            <em>*</em>
                                                                            Summary of Your Review
                                                                        </label>
                                                                        <div class="input-box">
                                                                            <input id="summary_field" class="input-text required-entry" type="text" value="" name="title">
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <label class="required" for="review_field">
                                                                            <em>*</em>
                                                                            Review
                                                                        </label>
                                                                        <div class="input-box">
                                                                            <textarea id="review_field" class="required-entry" rows="3" cols="5" name="detail"></textarea>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </fieldset>
                                                            <div class="buttons-set">
                                                                <button class="button" title="Submit Review" type="submit">
                                                                    <span>
                                                                        <span>Submit Review</span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="messages">
                                                <div class="collateral-box">
                                                    <p>
                                                        <img alt="" src="http://placehold.it/240x180" style="margin-top: 5px;">
                                                    </p>
                                                    <p>Retra faucibus eu laoreet nunc. Tincidunt nulla a Nulla eu convallis scelerisque sociis nulla interdum et. Cursus senectus aliquet pretium at tristique hac ullamcorper adipiscing et Donec. Enim montes parturient.</p>
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
                                            <div id="related_upsell" class="item-row owl-carousel owl-theme" style="display: inline-block">
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <div class="prd">
                                                            <div class="item-img clearfix">
                                                                <div class="ico-label">
                                                                    <span class="ico-product ico-sale">Sale</span>
                                                                </div>
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/16.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/17.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/18.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/19.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/11.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                            <div id="related_upsell1" class="item-row owl-carousel owl-theme" style="display: inline-block">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/8.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/13.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/3.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/26.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/29.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                            <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                                                <i class="fa fa-heart"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="link-compare" title="Add to Compare" href="#">
                                                                                <i class="fa fa-random"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="wrap-quickview" data-id="qv_item_7">
                                                                            <div class="quickview-wrap">
                                                                                <a class="sns-btn-quickview qv_btn" href="#">
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
            <!-- AND PARTNERS -->
@endsection
